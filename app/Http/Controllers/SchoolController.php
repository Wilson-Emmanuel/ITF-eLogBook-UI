<?php

namespace App\Http\Controllers;

use App\Traits\SchoolApi;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    use SchoolApi;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pageMessage = getPageMessage();
        return view("itf.new_school",["user"=>getUser(),"pageMessage"=>$pageMessage]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = [
            "school_name"=>$request->get("schoolName"),
            "address"=>$request->get("schoolAddress"),
            "state_name"=>$request->get("schoolState")
        ];
        $school =$this->addSchool($data);
        $schooljson = $school->json();
        if(!$school->ok())
            return back()->withErrors(["message"=>"School creation unsuccessful: ".$schooljson["message"]])->withInput();
        setPageMessage("School successfully added");
        return redirect("/itf/create_school");
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
