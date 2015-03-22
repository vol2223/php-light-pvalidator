<?php

namespace Vol2223\LightValidator;

use Vol2223\LightValidator\Validation\ValidationInterface;

class LightValidator
{
	/**
	 * @var \Vol2223\LightValidator\Validation\ValidationInterface
	 */
	private $validations;

	/**
	 * @var bool
	 */
	private $isError = false;

	/**
	 * @var string[]
	 */
	private $messages = [];
	
	/**
	 * @param ...\Vol2223\LightValidator\Validation\ValidationInterface $validations
	 */
	public function __construct()
	{
		$this->validations = func_get_args();
	}

	/**
	 * @param mixed $target バリデーションの対象
	 * @param mixed $value 汎用地
	 */
	public function validate($target, $value = null)
	{
		foreach ($this->validations as $validation) {
			$validation->validate($target, $value);
			if ($validation->isError()) {
				$this->isError = true;
				$this->messages[] = $validation->errorMessage();
			}
		}
	}

	/**
	 * エラーがあったか返す
	 *
	 * @return bool
	 */
	public function isError()
	{
		return $this->isError;
	}

	/**
	 * エラーがあればそれらのエラーメッセージを返す
	 *
	 * @return string[]
	 */
	public function messages()
	{
		return $this->messages;
	}
}
