<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttributeValue;

class AttributeValueController extends Controller
{
    public function index(){
        $attribute_values = AttributeValue::get();
        return view('admin.attribute_values.index',[
            'attribute_values' => $attribute_values
        ]);
    }

    public function create(){

        return view('admin.attribute_values.create');
    }

    public function store(Request $request){

        AttributeValue::create($request->all());
        return redirect()->route('attribute_values.index');
    }

    public function edit($id){
        $attribute_value = AttributeValue::find($id);
        return view('admin.attribute_values.edit',[
            'attribute_value' => $attribute_value
        ]);
    }

    public function update(Request $request, AttributeValue $attribute_value)
    {
        $input = $request->all();
        $attribute_value->fill($input)->save();

        return redirect()->route('attribute_values.index');
    }

    public function show($id){

    }

    public function destroy($id){
        AttributeValue::destroy($id);
        return redirect()->route('attribute_values.index');
    }
}
