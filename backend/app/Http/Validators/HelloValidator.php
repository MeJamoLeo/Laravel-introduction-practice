<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

// クラスを作成
class HelloValidator extends Validator
{
    // メソッドの定義
    public function validateHello($attribute, $value, $parameters)
    {
        return $value % 2 == 0;
    }
}
