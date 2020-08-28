@extends('layouts.helloapp')
@section('title', 'index')
@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<p>{{$msg}}</p>
@if (count($errors) > 0)
    {{-- $errorsはバリデーションで発生したエラーメッセージをまとめて管理するオブジェクト --}}
<p>入力に問題があります．再入力してください．</p>
@endif
{{--
    $errors オブジェクト
    {
        "mail":["The mail must be a valid email address."],
        "age":["The age must be a number."]
    }
--}}
<table>
<form action="/hello" method="post">
    {{-- フォームの内容をクッキーに保存する --}}
@csrf
    @if ($errors->has('msg'))
    <tr><th>ERROR</th><td>{{$errors->first('name')}}</td></tr>
    @endif
    <tr><th>Message: </th><td><input type="text" name="msg" value="{{old('msg')}}"></td></tr>

    <tr><th></th><td><input type="submit" name="send"></td></tr>
</form>
</table>
@endsection

@section('footer')
copyright 2017 tuyano
@endsection