<?php

namespace Vol2223\LightValidator;

use Vol2223\LightValidator\Validation\EnumValidation;

class LigthValidatorTest extends \PHPUnit_Framework_TestCase
{
	public function test_validate_EnumCheckIsError()
	{
		$lgithValidator = new LightValidator(
			new EnumValidation()
		);
		$lgithValidator->validate('aaa', ['enum' => ['HOGE', 'PIYO']]);
		$this->assertTrue($lgithValidator->isError());
		$this->assertEquals($lgithValidator->messages()[0], 'Enumのリストに無いものをでした enumList=HOGE,PIYO : actual=aaa');
	}

	public function test_validate_EnumCheckIsSuccess()
	{
		$lgithValidator = new LightValidator(
			new EnumValidation()
		);
		$lgithValidator->validate('HOGE', ['enum' => ['HOGE']]);
		$this->assertFalse($lgithValidator->isError());
		$this->assertTrue(empty($lgithValidator->messages()));
	}

	public function test_validate_EnumNoCheck()
	{
		$lgithValidator = new LightValidator(
			new EnumValidation()
		);
		$lgithValidator->validate('HOGE');
		$this->assertFalse($lgithValidator->isError());
		$this->assertTrue(empty($lgithValidator->messages()));
	}
}
