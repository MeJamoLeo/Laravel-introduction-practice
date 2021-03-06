<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Requwst $request)
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Requwst $request)
    {
        $item = Person::find($request->input);
        $params = ['input' => $request->input, 'item' => $item];
        return view('person.find', $params);
    }
}
