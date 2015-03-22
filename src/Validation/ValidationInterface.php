<?php

namespace Vol2223\LightValidator\Validation;

interface ValidationInterface
{
	/**
	 * @param mixed $target バリデーションの対象
	 * @param mixed $value 汎用地
	 */
	public function validate($target, $value = null);
}
