<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Tenants\Tenants\Helper\ABAC;

use Numbers\Backend\ABAC\Model\Attributes;
use Numbers\Backend\Db\Common\Model\Models;
use Numbers\Tenants\Tenants\DataSource\Policy\AllPolicies;
use Object\Query\Builder;

abstract class Common
{
    /**
     * Cached models
     *
     * @var array
     */
    public static $cached_models;
    public static $cached_models_by_ids;

    /**
     * Cached attributes
     *
     * @var array
     */
    public static $cached_attributes;
    public static $cached_attributes_by_models;
    public static $cached_attributes_by_model_ids;
    public static $cached_attributes_by_parents;

    /**
     * Cached policies
     *
     * @var array
     */
    public static $cached_policies;

    /**
     * Sub queries
     *
     * @var array
     */
    protected $subqueries = [];

    /**
     * Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        // disable ABAC when running from command line
        if (\Application::get('manager.enabled')) {
            return;
        }
        // preload models
        if (!isset(self::$cached_models)) {
            self::$cached_models = Models::getStatic([
                'pk' => ['sm_model_code'],
                'skip_acl' => true,
            ]);
            // generate array by ids
            self::$cached_models_by_ids = self::$cached_models;
            pk(['sm_model_id'], self::$cached_models_by_ids);
        }
        // preload attributes
        if (!isset(self::$cached_attributes)) {
            self::$cached_attributes = Attributes::getStatic([
                'skip_acl' => true,
                'orderby' => ['sm_abacattr_flag_link' => SORT_ASC],
            ]);
            // generate array by parents
            self::$cached_attributes_by_parents = self::$cached_attributes;
            pk(['sm_abacattr_parent_abacattr_id', 'sm_abacattr_id'], self::$cached_attributes_by_parents);
            // generate by model ids
            self::$cached_attributes_by_model_ids = self::$cached_attributes;
            pk(['sm_abacattr_model_id', 'sm_abacattr_id'], self::$cached_attributes_by_model_ids);
            // generate array by models
            self::$cached_attributes_by_models = [];
            foreach (self::$cached_attributes as $k => $v) {
                if (!isset(self::$cached_attributes_by_models[$v['sm_abacattr_model_id']])) {
                    self::$cached_attributes_by_models[$v['sm_abacattr_model_id']] = [
                        'model_code' => self::$cached_models_by_ids[$v['sm_abacattr_model_id']]['sm_model_code'],
                        'model_id' => $v['sm_abacattr_model_id'],
                        'links' => [
                            'same_table' => [],
                            'other_table' => [],
                            'link_table' => [],
                        ]
                    ];
                }
                // model itself
                if (!isset(self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['same_table'][$v['sm_abacattr_model_id']])) {
                    self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['same_table'][$v['sm_abacattr_model_id']] = [
                        'model' => self::$cached_models_by_ids[$v['sm_abacattr_model_id']]['sm_model_code'],
                        'columns' => [],
                        'direct' => true,
                        'map' => []
                    ];
                    self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['same_table'][$v['sm_abacattr_model_id']]['columns'][$v['sm_abacattr_id']] = $v['sm_abacattr_code'];
                    self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['same_table'][$v['sm_abacattr_model_id']]['map'][$v['sm_abacattr_code']] = $v['sm_abacattr_code'];
                }
                // other table
                if (!empty($v['sm_abacattr_flag_other_table'])) {
                    $parent_model_id = self::$cached_attributes[$v['sm_abacattr_parent_abacattr_id']]['sm_abacattr_model_id'];
                    if (!isset(self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['other_table'][$parent_model_id])) {
                        self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['other_table'][$parent_model_id] = [
                            'model' => self::$cached_models_by_ids[$v['sm_abacattr_model_id']]['sm_model_code'],
                            'columns' => [],
                            'parent_columns' => [],
                            'other' => true,
                            'map' => []
                        ];
                        self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['other_table'][$parent_model_id]['columns'][$v['sm_abacattr_id']] = $v['sm_abacattr_code'];
                        //self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['other_table'][$parent_model_id]['map'][self::$cached_attributes[$v['sm_abacattr_parent_abacattr_id']]['sm_abacattr_code']] = $v['sm_abacattr_code'];
                        self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['other_table'][$parent_model_id]['parent_columns'][$v['sm_abacattr_parent_abacattr_id']] = self::$cached_attributes[$v['sm_abacattr_parent_abacattr_id']]['sm_abacattr_code'];
                        // map
                        foreach (self::$cached_attributes_by_model_ids[$v['sm_abacattr_model_id']] as $k2 => $v2) {
                            if ($k2 == $v['sm_abacattr_id']) {
                                continue;
                            }
                            self::$cached_attributes_by_models[$v['sm_abacattr_model_id']]['links']['other_table'][$parent_model_id]['map'][$v2['sm_abacattr_code']] = $v2['sm_abacattr_code'];
                        }
                    }
                }
                // if we have a link
                if (!empty($v['sm_abacattr_flag_link'])) {
                    $parent_model_id = self::$cached_attributes[$v['sm_abacattr_parent_abacattr_id']]['sm_abacattr_model_id'];
                    if (!isset(self::$cached_attributes_by_models[$parent_model_id]['links']['link_table'][$v['sm_abacattr_link_model_id']])) {
                        self::$cached_attributes_by_models[$parent_model_id]['links']['link_table'][$v['sm_abacattr_link_model_id']] = [
                            'model' => self::$cached_models_by_ids[$v['sm_abacattr_model_id']]['sm_model_code'],
                            'link_model' => self::$cached_models_by_ids[$v['sm_abacattr_link_model_id']]['sm_model_code'],
                            'columns' => [],
                            'parent_columns' => [],
                            'link' => true,
                            'map' => [],
                        ];
                        self::$cached_attributes_by_models[$parent_model_id]['links']['link_table'][$v['sm_abacattr_link_model_id']]['parent_columns'][$v['sm_abacattr_parent_abacattr_id']] = self::$cached_attributes[$v['sm_abacattr_parent_abacattr_id']]['sm_abacattr_code'];
                        self::$cached_attributes_by_models[$parent_model_id]['links']['link_table'][$v['sm_abacattr_link_model_id']]['columns'][$v['sm_abacattr_id']] = $v['sm_abacattr_code'];
                        // map
                        foreach (self::$cached_attributes_by_model_ids[$v['sm_abacattr_model_id']] as $k2 => $v2) {
                            if ($k2 == $v['sm_abacattr_id']) {
                                continue;
                            }
                            self::$cached_attributes_by_models[$parent_model_id]['links']['link_table'][$v['sm_abacattr_link_model_id']]['map'][self::$cached_attributes[$v2['sm_abacattr_parent_abacattr_id']]['sm_abacattr_code']] = $v2['sm_abacattr_code'];
                        }
                    }
                }
            }
        }
        // preload models
        if (!isset(self::$cached_policies)) {
            self::$cached_policies = AllPolicies::getStatic([
                'skip_acl' => true,
            ]);
        }
        //print_r2(self::$cached_attributes_by_models);
    }

    /**
     * Has policies
     *
     * @param string $model_code
     * @return bool
     */
    public function hasPolicies(string $model_code, Builder & $query, string $alias_main_table): bool
    {
        // fix existing values
        if (!empty($this->options['existing_values']) && !is_array($this->options['existing_values'])) {
            $this->options['existing_values'] = [$this->options['existing_values']];
        }
        // we do not process policies for super admins
        if (\User::get('super_admin')) {
            return false;
        }
        if (!\User::authorized()) {
            return false;
        }
        // some variables
        $model_code = '\\' . $model_code;
        if (!isset(self::$cached_models[$model_code])) {
            // todo handle virtual models
            if (strpos($model_code, '\Virtual\\') !== false) {
                return false;
            }
            // check for alias
            $temp_model = new $model_code();
            if (!empty($temp_model->alias_model)) {
                $model_code = $temp_model->alias_for;
            }
        }
        $model_id = self::$cached_models[$model_code]['sm_model_id'];
        $alias = 1000;
        if (!empty($this->options['skip_acl'])) {
            return false;
        }
        // columns from main table
        $pk9 = $query->primary_model->pk;
        if (!empty($query->primary_model->tenant)) {
            unset($pk9[0]);
        }
        if (count($pk9) == 1) {
            $column9 = $query->db_object->cast($alias_main_table . '.' . current($pk9), 'varchar');
        } else {
            $pk10 = $pk9;
            array_key_prefix_and_suffix($pk10, $alias_main_table . '.');
            $column9 = "concat_ws('::', " . implode(', ', $pk10) . ")";
        }
        foreach (self::$cached_policies as $k => $v) {
            // global assignment
            if ($v['type'] == 'GLOBAL_ASSIGNMENT_ENFORCEMENT') {
                $parent_model_id = self::$cached_attributes[$v['global_abacattr_id']]['sm_abacattr_model_id'];
                // case 1 we have attribute in a table
                if (!empty(self::$cached_attributes_by_models[$model_id]['links']['same_table'][$model_id]['columns'][$v['global_abacattr_id']])) {
                    // sql
                    $column = self::$cached_attributes[$v['global_abacattr_id']]['sm_abacattr_code'];
                    $class = self::$cached_attributes_by_models[$model_id]['links']['same_table'][$model_id]['model'];
                    $model = new $class();
                    $alias1 = 'policy_table_' . $alias++;
                    $alias2 = 'policy_table_' . $alias++;
                    // on clause
                    $method = \Factory::method(self::$cached_attributes[$v['global_abacattr_id']]['sm_abacattr_environment_method']);
                    $temp_on_where = [
                        $alias1 . '.' . $column => \Factory::model($method[0], true)->{$method[1]}(),
                    ];
                    if (!empty($this->options['existing_values'])) {
                        $temp_on_where[$alias1 . '.' . $column . ';IN'] = $this->options['existing_values'];
                    }
                    $temp_on_sql = $model->db_object->prepareCondition($temp_on_where, 'OR');
                    // build query
                    $temp_query = $model->queryBuilder(['alias' => $alias1, 'skip_acl' => true])->select();
                    $temp_query->join('LEFT', new $class(['skip_acl' => true]), $alias2, 'ON', [
                        ['AND', [$alias1 . '.' . $column, '=', $alias2 . '.' . $column, true], false],
                        ['AND', '(' . $temp_on_sql . ')', false]
                    ]);
                    $temp_query->columns(1);
                    $temp_query->where('AND', '(CASE WHEN ' . $alias2 . '.' . $column . ' IS NULL THEN false ELSE true END)');
                    $temp_query->where('AND', [$model->db_object->cast($alias1 . '.' . $column, 'varchar'), '=', $column9, true, true]);
                    $this->subqueries[] = [
                        'exists' => $temp_query->sql(),
                    ];
                } elseif (!empty(self::$cached_attributes_by_models[$model_id]['links']['other_table'][$parent_model_id]['parent_columns'][$v['global_abacattr_id']])) {
                    $temp_data = self::$cached_attributes_by_models[$model_id]['links']['other_table'][$parent_model_id];
                    // sql
                    $column = current($temp_data['columns']);
                    $column2 = current($temp_data['map']);
                    $class = $temp_data['model'];
                    $model = new $class();
                    $alias1 = 'policy_table_' . $alias++;
                    $alias2 = 'policy_table_' . $alias++;
                    // on clause
                    $method = \Factory::method(self::$cached_attributes[$v['global_abacattr_id']]['sm_abacattr_environment_method']);
                    $temp_on_where = [
                        $alias1 . '.' . $column => \Factory::model($method[0], true)->{$method[1]}(),
                    ];
                    $temp_combined = [];
                    if (!empty($this->options['existing_values'])) {
                        foreach ($this->options['existing_values'] as $k0 => $v0) {
                            if (is_json($v0)) {
                                $temp_existing = json_decode($v0, true);
                                foreach ($temp_existing as $k => $v) {
                                    if (strpos($column2, $k) !== false) {
                                        $temp_combined[] = $v;
                                        break;
                                    }
                                }
                            } else {
                                $temp_combined[] = $v0;
                            }
                        }
                        $temp_on_where[$alias1 . '.' . $column2 . ';IN'] = $temp_combined;
                    }
                    $temp_on_sql = $model->db_object->prepareCondition($temp_on_where, 'OR');
                    // build query
                    $temp_query = $model->queryBuilder(['alias' => $alias1, 'skip_acl' => true])->select();
                    // where
                    if (!empty($this->options['where'])) {
                        $temp_where = [];
                        foreach ($this->options['where'] as $k => $v) {
                            $temp_where[$alias1 . '.' . $k] = $v;
                        }
                        if (!empty($temp_combined)) {
                            $pk2 = end($this->options['pk']);
                            $temp_query->where('AND', function (& $query) use ($pk2, $temp_combined, $temp_where, $alias1) {
                                $query->where('OR', [$alias1 . '.' . $pk2, '=', $temp_combined, false]);
                                $query->where('OR', function (& $query) use ($temp_where) {
                                    $query->whereMultiple('AND', $temp_where);
                                });
                            });
                        } else {
                            $temp_query->whereMultiple('AND', $temp_where);
                        }
                    }
                    $temp_query->columns(1);
                    $temp_query->where('AND', '(CASE WHEN ' . $alias1 . '.' . $column . ' IS NULL THEN false ELSE true END)');
                    $temp_query->where('AND', '(' . $temp_on_sql . ')');
                    $temp_query->where('AND', [$model->db_object->cast($alias1 . '.' . $column2, 'varchar'), '=', $column9, true, true]);
                    $this->subqueries[] = [
                        'exists' => $temp_query->sql(),
                    ];
                } elseif (!empty(self::$cached_attributes_by_models[$parent_model_id]['links']['link_table'][$model_id]['parent_columns'][$v['global_abacattr_id']])) {
                    $temp_data = self::$cached_attributes_by_models[$parent_model_id]['links']['link_table'][$model_id];
                    // sql
                    $column = current($temp_data['columns']);
                    $column2 = current($temp_data['map']);
                    $class = $temp_data['model'];
                    $model = new $class();
                    $alias1 = 'policy_table_' . $alias++;
                    $alias2 = 'policy_table_' . $alias++;
                    // on clause
                    $method = \Factory::method(self::$cached_attributes[$v['global_abacattr_id']]['sm_abacattr_environment_method']);
                    $temp_on_where = [
                        $alias1 . '.' . $column => \Factory::model($method[0], true)->{$method[1]}(),
                    ];
                    if (!empty($this->options['existing_values'])) {
                        $temp_on_where[$alias1 . '.' . $column2 . ';IN'] = $this->options['existing_values'];
                    }
                    $temp_on_sql = $model->db_object->prepareCondition($temp_on_where, 'OR');
                    // build query
                    $temp_query = $model->queryBuilder(['alias' => $alias1, 'skip_acl' => true])->select();
                    $temp_query->columns(1);
                    $temp_query->where('AND', '(CASE WHEN ' . $alias1 . '.' . $column . ' IS NULL THEN false ELSE true END)');
                    $temp_query->where('AND', '(' . $temp_on_sql . ')');
                    $temp_query->where('AND', [$model->db_object->cast($alias1 . '.' . $column2, 'varchar'), '=', $column9, true, true]);
                    $this->subqueries[] = [
                        'exists' => $temp_query->sql(),
                    ];
                }
            }
        }
        return !empty($this->subqueries);
    }

    /**
     * Merge queries
     *
     * @param Builder $query
     * @param string $alias
     * @param array $options
     * @return boolean
     */
    public function mergeQueries(Builder & $query, string $alias, array $options = []): bool
    {
        $inner_query = new Builder($query->db_link);
        $inners = [];
        $exists = [];
        foreach ($this->subqueries as $v) {
            if (!empty($v['sql'])) {
                $inners[] = $v['sql'];
            } elseif (!empty($v['exists'])) {
                $exists[] = $v['exists'];
            }
        }
        // exists
        if (!empty($exists)) {
            $exists = implode('UNION ALL', $exists);
            $query->where('AND', '(' . $exists . ')', 'EXISTS');
        }
        // inner joins
        if (!empty($inners)) {
            // columns
            $pk = $query->primary_model->pk;
            if (!empty($query->primary_model->tenant)) {
                unset($pk[0]);
            }
            if (count($pk) == 1) {
                $column = $query->db_object->cast($alias . '.' . current($pk), 'varchar');
            } else {
                $column = "concat_ws('::', " . implode(', ', $pk) . ")";
            }
            $inners = implode('UNION ALL', $inners);
            $inner_query->from('(' . $inners . ')', '__acl_groupped_inner');
            $inner_query->columns([
                '__acl_id' => '__acl_id',
                '__acl_failed' => 'SUM(__acl_failed)'
            ]);
            $inner_query->groupby(['__acl_id']);
            $query->join('INNER', $inner_query, '__acl_groupped_outer', 'ON', [
                ['AND', ['__acl_groupped_outer.__acl_id', '=', $column, true], false],
                ['AND', ['__acl_groupped_outer.__acl_failed', '=', 0, false], false]
            ]);
        }
        return true;
    }

    /**
     * Process
     *
     * @param string $model_code
     * @param Builder $query
     * @param array $options
     * @return array
     */
    abstract public function process(string $model_code, Builder & $query, string $alias, array $options = []): bool;
}
