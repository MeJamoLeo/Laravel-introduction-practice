<?php

namespace App\Providers;

use App\Http\Validators\HelloValidator;
use Illuminate\Support\ServiceProvider;
use Validator;

class HelloServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $validator = $this->app['validator']; // バリデータはここに保管されている
        // resolverメソッドでリゾルブ（バリデーション処理を行う）の処理を設定できます．
        $validator->resolver(function ($translator, $data, $rules, $messages) {
            $a_validator = new HelloValidator($translator, $data, $rules, $messages);
            return $a_validator;
        });
    }
}
