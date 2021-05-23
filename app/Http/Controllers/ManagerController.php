<?php

namespace App\Http\Controllers;

use App\Traits\BaseApiRequester;
use App\Traits\ManagerApi;
use App\Traits\StudentApi;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    use ManagerApi,StudentApi;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        $user =getUser();
        if($user ==null){
            return redirect("/login");
        }
        $pageMessage =getPageMessage();
        return view("manager.profile",["user"=>$user,"pageMessage"=>$pageMessage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $states = getStates();
        $user = getUser();

        $pageMessage = getPageMessage();

        if($user == null){
            return redirect("/login");
        }
        return view("coordinator.new_manager",[
            "states"=>$states,
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
       $d = $request->all();
       $rd = [
           "company_address"=> $d["companyAddress"],
          "company_name"=> $d["companyName"],
          "company_type"=>$d["companyType"],
          "email"=>$d["email"],
          "first_name"=>$d["firstName"],
          "last_name"=>$d["lastName"],
          "password"=>$d["password"],
          "phone"=>$d["phone"],
          "state_name"=>$d["state"]
       ];
        $response = $this->saveManager($rd);
        $json = $response->json();
        if(!$response->ok())
            return back()->withErrors(["message"=>"Manager creation unsuccessful: ".$json["message"]])->withInput();
        setPageMessage("Manager successfully added");
        return redirect("/coordinator/create_manager");
    }
    public function signWeek(Request $request){
        $student_id = decode_parameter($request->get("studentId"));
        $options = [
            "start_date"=>$request->get("start"),
            "end_date"=>$request->get("end")
        ];
        $res = $this->signLog(getUserId(),$student_id,$options);
        if(!$res["status"]){
            return back()->withErrors(["message"=>"Failed: ".$res["message"]]);
        }
        setPageMessage("Log Booked Signed for Week ".$request->get("weekNo")." : ".$options["start_date"]." - ".$options["end_date"]);
        return redirect("/manager/logbook/".encode_parameter($student_id)."/".$request->get("weekNo"));
    }

    public function show_managers($current){

    }
    public function view_manager($manager_id){

    }
}
