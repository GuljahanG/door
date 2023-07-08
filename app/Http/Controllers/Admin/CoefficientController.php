<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coefficient;


class CoefficientController extends Controller
{
    public function index(){
        $coefficients = Coefficient::get();
        return view('admin.coefficients.index',[
            'coefficients' => $coefficients
        ]);
    }

    public function create(){

        return view('admin.coefficients.create');
    }

    public function store(Request $request){

        Coefficient::create($request->all());
        return redirect()->route('coefficients.index');
    }

    public function edit($id){
        $coefficient = Coefficient::find($id);
        return view('admin.coefficients.edit',[
            'coefficient' => $coefficient
        ]);
    }

    public function update(Request $request, Coefficient $coefficient)
    {
        $input = $request->all();
        $coefficient->fill($input)->save();

        return redirect()->route('coefficients.index');
    }

    public function show($id){

    }

    public function destroy($id){
        Coefficient::destroy($id);
        return redirect()->route('coefficients.index');
    }
}
