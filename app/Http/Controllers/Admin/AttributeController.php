<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function index(){
        $attributes = Attribute::get();
        return view('admin.attributes.index',[
            'attributes' => $attributes
        ]);
    }

    public function create(){

        return view('admin.attributes.create');
    }

    public function store(Request $request){

        if($request->has('multiple')) $request['multiple'] = true;
        else $request['multiple'] = false;
        Attribute::create($request->all());
        return redirect()->route('attributes.index');
    }

    public function edit($id){
        $attribute = Attribute::find($id);
        return view('admin.attributes.edit',[
            'attribute' => $attribute
        ]);
    }

    public function update(Request $request, Attribute $attribute)
    {
        $input = $request->all();
        if($request->has('multiple')) $input['multiple'] = true;
        else $input['multiple'] = false;
        $attribute->fill($input)->save();

        return redirect()->route('attributes.index');
    }

    public function show($id){

    }

    public function destroy($id){
        Attribute::destroy($id);
        return redirect()->route('attributes.index');
    }
}
