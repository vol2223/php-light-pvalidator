<?php

namespace Vol2223\LightValidator\Validation;

abstract class Validation implements ValidationInterface
{
	protected $errorMessage;
	protected $isError = false;

	abstract public function validate($target, $enumList = null);

	protected function error($errorMessage)
	{
		$this->isError = true;
		$this->errorMessage = $errorMessage;
	}

	public function isError()
	{
		return $this->isError;
	}

	public function errorMessage()
	{
		return $this->errorMessage;
	}
}
