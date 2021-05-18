<?php

namespace App\Http\Controllers;

use App\Models\ITFAdmin;
use App\Traits\BaseApiRequester;
use App\Traits\ITFAdminApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    use ITFAdminApi, BaseApiRequester;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
            $id = $request->session()->get("userId");
            $data = ITFAdminApi::getAdmin($id);
            if(!$data["status"]){
                return redirect("/login");
            }
            $pageMessage = null;
            if($request->session()->has("pageMessage")){
                $pageMessage = $request->session()->get("pageMessage");
                $request->session()->forget("pageMessage");
            }

            return view("itf.profile",["user"=>$data["data"],"pageMessage"=>$pageMessage]);
    }
    public function updatePassword(Request  $request){
        $message = "Unsuccessful";
        if($request->has("password")){
            $response = Http::withHeaders(ITFAdminApi::getKeys())->put(env("BASE_URL")."/v1/itf/change-password/".session("userId"),[
                "password"=>$request->get("password")
            ]);
            if($response->ok()){
                $request->session()->put(["pageMessage"=>"Password successfully updated"]);
                return redirect("itf/dashboard");
            }
        }
        return back()->withErrors(["message"=>$message])->withInput();
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
    public function showCreateCoordinator(Request  $request){
        $states = BaseApiRequester::getStates();
        $schools = BaseApiRequester::getSchools();
        $id = $request->session()->get("userId");
        $data = ITFAdminApi::getAdmin($id);

        $pageMessage = null;
        if($request->session()->has("pageMessage")){
            $pageMessage = $request->session()->get("pageMessage");
            $request->session()->forget("pageMessage");
        }
        if(!$data["status"]){
            return redirect("/login");
        }
        return view("itf.new_coordinator",[
            "states"=>$states,
            "schools"=>$schools,
            "user"=>$data["data"],
            "pageMessage"=>$pageMessage
        ]);
    }
    public function createCoordinator(Request  $request){

    }
}
