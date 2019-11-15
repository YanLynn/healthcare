<?php

namespace App\Http\Controllers;
use App\special_feature;
use Illuminate\Http\Request;

class SpecialFeatureController extends Controller
{

    public function index()
    {
        $feature = special_feature::all()->toArray();
        return array_reverse($feature);
    }


    public function create()
    {

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'short_name'=>'required',
            'type.required' => '選択してください。',

        ]);

        $feature = new special_feature([
            'name' => $request->name,
            'short_name' =>$request->short_name,
            'type' =>$request->type,
            'user_id' => 1,
            'recordstatus' => 1
        ]);

        $feature->save();
        return $request->all();
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $feature = special_feature::find($id);
        return response()->json($feature);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $feature = special_feature::find($id);
        $feature->update($request->all());

        return response()->json('The Feature successfully updated');
    }


    public function destroy($id)
    {
        $feature = special_feature::find($id);
        $feature->delete();
        return response()->json('The Feature successfully deleted');
    }
}
