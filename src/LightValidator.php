<?php

namespace Vol2223\LightValidator;

use Vol2223\LightValidator\Validation\Validation;

class LightValidator
{
	/**
	 * @var \Vol2223\LightValidator\Validation\Validation[]
	 */
	private $validations = [];

	/**
	 * @var bool
	 */
	private $isError = false;

	/**
	 * @var string[]
	 */
	private $messages = [];
	
	/**
	 * @param ...\Vol2223\LightValidator\Validation\Validation $validations
	 * @throws \Exception
	 */
	public function __construct()
	{
		foreach (func_get_args() as $arg) {
			if ('Vol2223\LightValidator\Validation\Validation' !== get_parent_class($arg)) {
				throw new \Exception(sprintf(
					'予期せぬValidationクラスが渡されました。className=%s',
					get_parent_class($arg)
				));
			}
			$this->validations[] = $arg;
		}
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
