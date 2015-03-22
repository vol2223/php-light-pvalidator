# php-light-pvalidator

[![Build Status](https://travis-ci.org/vol2223/php-light-pvalidator.svg?branch=master)](https://travis-ci.org/vol2223/php-light-pvalidator)
[![Coverage Status](https://coveralls.io/repos/vol2223/php-light-pvalidator/badge.svg)](https://coveralls.io/r/vol2223/php-light-pvalidator)

# How To Use

```
<?php

use Vol2223\LightValidator\LightValidator;
use Vol2223\LightValidator\Validation\Validation;

$lgithValidator = new LightValidator(
    new IntegerValidation(),
    new MaxLengthValidation(),
    new MiniLengthValidation()
);
$lgithValidator->validate(100);

class IntegerValidation extends Validation
{
	public function validate($target, $value = null)
	{
		if (is_null($target)) {
			return;
		}
		if (!is_int($target)) {
			$this->error(sprintf(
				'数値ではありませんでした。 target=%s',
				$target
			));
		}
	}
}

class MaxLengthValidation extends Validation
{
	//....
}

class MiniLengthValidation extends Validation
{
	//....
}
```
