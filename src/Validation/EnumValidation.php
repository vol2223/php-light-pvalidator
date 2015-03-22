<?php

namespace Vol2223\LightValidator\Validation;

class EnumValidation extends Validation
{
	/**
	 * Enumの整合性チェック
	 *
	 * <code>
	 * $enumList = [
	 *     'enum' => [
	 *         'Hoge',
	 *         'PIYO'
	 *     ]
	 * ];
	 * </code>
	 *
	 * @param [] $enumList
	 * @param mixed $target
	 */
	public function validate($target, $enumList = null)
	{
		if (is_null($enumList)) {
			return;
		}
		$enumList = $enumList['enum'];
		if (!in_array($target, $enumList)) {
			$this->error(sprintf(
				'Enumのリストに無いものをでした enumList=%s : actual=%s',
				implode(',', $enumList),
				$target
			));
		}
	}
}
