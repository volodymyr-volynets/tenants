<?php

namespace Numbers\Tenants\Tenants\Helper\ABAC;
class Get extends \Numbers\Tenants\Tenants\Helper\ABAC\Common {

	/**
	 * Process
	 *
	 * @param string $model_code
	 * @param \Object\Query\Builder $query
	 * @param array $options
	 * @return boolean
	 */
	public function process(string $model_code, \Object\Query\Builder & $query, string $alias, array $options = []) : bool {
		$this->options = $options;
		if ($this->hasPolicies($model_code, $query, $alias)) {
			return $this->mergeQueries($query, $alias);
		}
		return false;
	}
}