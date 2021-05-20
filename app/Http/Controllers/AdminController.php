<?php

namespace App\Http\Controllers;

use App\Traits\BaseApiRequester;
use App\Traits\ITFAdminApi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use ITFAdminApi, BaseApiRequester;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $user =getUser();
            if($user ==null){
                return redirect("/login");
            }
            $pageMessage =getPageMessage();
            //dd(getUser());
            return view("itf.profile",["user"=>$user,"pageMessage"=>$pageMessage]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $user = getUser();

        $pageMessage = getPageMessage();

        if($user == null){
            return redirect("/login");
        }
        return view("itf.new_admin",[
            "user"=>$user,
            "pageMessage"=>$pageMessage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $d =$request->all();
        $rd = [
            "branch"=>$d["branch"],
              "email"=>$d["email"],
              "first_name"=>$d["firstName"],
              "last_name"=>$d["lastName"],
              "password"=>$d["password"],
              "phone"=>$d["phone"],
              "staff_number"=>$d["staffNo"]
        ];
        $response = $this->saveAdmin($rd);
        $json = $response->json();
        if(!$response->ok())
            return back()->withErrors(["message"=>"Staff creation unsuccessful: ".$json["message"]])->withInput();
        setPageMessage("Staff successfully added");
        return redirect("/itf/create_staff");
    }
    public function signLogBook(){

    }
    public function unSignLogBook(){

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
        $states = getStates();
        $schools = BaseApiRequester::getSchools(["size"=>1000,"password"=>0]);
        $user = getUser();

        $pageMessage = getPageMessage();

        if($user == null){
            return redirect("/login");
        }
        return view("itf.new_coordinator",[
            "states"=>$states,
            "schools"=>$schools,
            "user"=>$user,
            "pageMessage"=>$pageMessage
        ]);
    }

    public function storeCoordinator(Request  $request){
        $d = $request->all();
        $rd = [
            "department"=> $d["department"],
            "email"=> $d["email"],
          "first_name"=> $d["firstName"],
          "last_name"=> $d["lastName"],
          "password"=> $d["password"],
          "phone"=> $d["phone"],
          "school_name"=> $d["school"]
        ];
        $response = $this->saveCoordinator($rd);

        $json = $response->json();
        if(!$response->ok())
            return back()->withErrors(["message"=>"Coordinator creation unsuccessful: ".$json["message"]])->withInput();
        setPageMessage("Coordinator successfully added");
        return redirect("/itf/create_coordinator");
    }
}
