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
    public function show_students($current){
        //current = current page(20 students per page
        $options = [
            "page"=>$current,
            "size"=>20,
            "manager_email"=>getUser()->getInfo()->getEmail()
        ];
        $res = $this->searchStudents($options);
        if(!$res["status"])
            return back();

        $students = $res["students"];
        $pages = $res["pages"];
        return view("manager.students",[
            "user"=>getUser(),
            "students"=>$students,
            "current"=>$current,
            "pages"=>$pages
        ]);

    }
    public function view_student($student_id){
        $id = decode_parameter($student_id);
        $user = getUser();
        $student = $this->getStudent($id);
        if(!isset($student) || strcmp($student->getInfo()->getEmail(),$user->getInfo()->getEmail()) != 0)
            return back();

        return view("manager.student",[
            "user"=>$user,
            "student"=>$student
        ]);
    }
    public function view_student_logbook($student_id, $week_no){
        $id = decode_parameter($student_id);
        $student = $this->getStudent($id);
        if(!isset($student))
            return back();

        $week = null;
        $pageMessage =getPageMessage();
        if(count($student->getWeeks()) >= $week_no && $week_no >0){
            $week = $student->getWeeks()[$week_no-1];
        }
        $start = max(1,$week_no-5);
        $end = min(count($student->getWeeks()), $week_no+5);
        $startDay = "";
        $endDay = "";
        if(isset($week)){
            $days = $week->getDays();
            $startDay = $days[0]->getDate();
            $endDay = $days[count($days)-1]->getDate();
        }
        return view("manager.logbook",[
            "user"=>getUser(),
            "student"=>$student,
            "pageMessage"=>$pageMessage,
            "weekNo"=>$week_no,
            "week"=>$week,
            "start"=>$start,
            "end"=>$end,
            "startDay"=>$startDay,
            "endDay"=>$endDay
        ]);
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
