<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NursingProfile;
use App\Cooperate_Medical;
use App\Medical;
use App\Staff;

class ProfilePublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nurse = NursingProfile::all()->toArray();
        return array_reverse($nurse);
    }


    public function getcooperatemedical()
    {
        //
        $comedical = Cooperate_Medical::all()->toArray();
        return array_reverse($comedical);
    }

    public function getmedicalacceptance()
    {
        //
        $medical = Medical::select('name')->where('id',1)->get();
        return $medical;
    }

    public function getstaff()
    {
        //
        $staff = Staff::select('staff')->where('id',1)->get();
        return $staff;
    }

    

    



    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
