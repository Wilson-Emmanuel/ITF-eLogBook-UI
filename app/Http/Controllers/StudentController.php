<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Traits\ManagerApi;
use App\Traits\StudentApi;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use StudentApi,ManagerApi;
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
        return view("student.profile",["student"=>$user,"pageMessage"=>$pageMessage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $user = getUser();
        $companies = self::getCompanies(["page"=>0,"size"=>1000]);
        $pageMessage = getPageMessage();

        if($user == null){
            return redirect("/login");
        }
        return view("coordinator.new_student",[
            "user"=>$user,
            "companies"=>$companies,
            "student"=>$user,
            "pageMessage"=>$pageMessage
        ]);
    }

    public function show_update_password(){
        $user = getUser();
        $pageMessage = getPageMessage();

        if($user == null){
            return redirect("/login");
        }
        return view("student.update_password",[
            "student"=>$user,
            "pageMessage"=>$pageMessage
        ]);
    }
    public function show_update_bank(){
        $user = getUser();
        $pageMessage = getPageMessage();

        if($user == null){
            return redirect("/login");
        }
        return view("student.update_bank",[
            "student"=>$user,
            "pageMessage"=>$pageMessage
        ]);
    }
    public function update_bank(Request $request){
        $d = $request->all();
        $rd = [
            "account_name"=>$d["accountName"],
          "account_number"=>$d["accountNumber"],
          "bank_name"=>$d["bankName"],
          "sort_code"=>$d["bankSortCode"]
        ];

        $response = $this->updateBank($rd,getUserId());
        $json = $response->json();
        if(!$response->ok())
            return back()->withErrors(["message"=>"Bank update failed: ".$json["message"]])->withInput();

        $user = getUser();
        $data = $json["data"];
        $user->setAccountNumber($data["account_number"]);
        $user->setAccountName($data["account_name"]);
        $user->setBankName($data["bank_name"]);
        $user->setBankSortCode($data["sort_code"]);
        updateUser($user);
        setPageMessage("Bank details successfully updated");
        return redirect("/student/update_bank");
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
            "coordinator_id"=>getUserId(),
            "email"=>$d["email"],
            "first_name"=>$d["firstName"],
            "last_name"=>$d["lastName"],
            "manager_id"=>$d["company"],
            "password"=>$d["password"],
            "phone"=>$d["phone"],
            "reg_number"=>$d["regNo"],
            "start_date"=>$d["startDate"]
        ];
        $response = $this->saveStudent($rd);
        $json = $response->json();
        if(!$response->ok())
            return back()->withErrors(["message"=>"Student creation unsuccessful: ".$json["message"]])->withInput();
        setPageMessage("Student successfully added");
        return redirect("/coordinator/create_student");
    }

    public function showLogBook($week_no){
        $user =getUser();
        if($user ==null){
            return redirect("/login");
        }

        $week = null;
        $pageMessage =getPageMessage();
        if(count($user->getWeeks()) >= $week_no && $week_no >0){
            $week = $user->getWeeks()[$week_no-1];
        }
        $start = max(1,$week_no-5);
        $end = min(count($user->getWeeks()), $week_no+5);
        $startDay = "";
        $endDay = "";
        if(isset($week)){
            $days = $week->getDays();
            $startDay = $days[0]->getDate();
            $endDay = $days[count($days)-1]->getDate();
        }
        return view("student.logbook",[
            "student"=>$user,
            "pageMessage"=>$pageMessage,
            "weekNo"=>$week_no,
            "week"=>$week,
            "start"=>$start,
            "end"=>$end,
            "startDay"=>$startDay,
            "endDay"=>$endDay
        ]);
    }

    public function show_fill_logbook($week, $day){
        if(!$this->isValidWeekDay($week,$day)){
            return back();
        }
        $user = getUser();
        $weeks = $user->getWeeks();
        $days = $weeks[$week]->getDays();
        $dailyTask = $days[$day];

        return view("student.fill_log",[
            "student"=>$user,
           "date"=>$dailyTask->getDate(),
           "task"=>$dailyTask->getTask(),
           "week"=>$week,
           "day"=>$day
        ]);

    }
    public function fill_logbook(Request  $request){
            $day =$request->get("day",-1);
            $week = $request->get("week",-1);
            if(!$this->isValidWeekDay($week,$day)){
                return back()->withErrors(["message"=>"Invalid data"])->withInput();
            }
            $task = $request->get("task");
            $date = $request->get("date");
            $rd = [
                "task"=>$task,
                "taskDate"=>$date
            ];
        $response = $this->fillTask($rd,getUserId());
        $json = $response->json();
        if(!$response->ok())
            return back()->withErrors(["message"=>"Task not entered: ".$json["message"]])->withInput();

        $user = getUser();
        $user->getWeeks()[$week]->getDays()[$day]->setTask($task);
        updateUser($user);
        setPageMessage("Task successfully entered. Date: ".$date);
        return redirect("/student/logbook/".($week+1));
    }
    private function isValidWeekDay($week, $day){
        $user = getUser();
        if($week < 0 || $week >= count($user->getWeeks())){
            return false;
        }
        $weeks = $user->getWeeks();
        if($day < 0 || $day >= count($weeks[$week]->getDays())){
            return false;
        }
        $days = $weeks[$week]->getDays();
        $dailyTask = $days[$day];
        if(!$dailyTask->isEditable()){
            return false;
        }
        return true;
    }


    public function show_students($current){
        //current = current page(20 students per page
        $user = getUser();
        $options = [
            "page"=>$current,
            "size"=>20
        ];
        if(!isAdmin()){
            $options[strtolower(getUserType())."_email"]=$user->getInfo()->getEmail();
        }
        $res = $this->searchStudents($options);
        if(!$res["status"])
            return back();

        $students = $res["students"];
        $pages = $res["pages"];
        //dd($options,$students);
        return view(strtolower(getUserType()).".students",[
            "user"=>$user,
            "students"=>$students,
            "current"=>$current,
            "pages"=>$pages
        ]);

    }
    public function show_coordinator_students($email){
        //current = current page(20 students per page
        $user = getUser();
        $options = [
            "page"=>0,
            "size"=>1000,
            "coordinator_email"=>$email
        ];

        $res = $this->searchStudents($options);
        if(!$res["status"])
            return back();

        $students = $res["students"];

        return view("itf.coordinator.students",[
            "user"=>$user,
            "students"=>$students,
        ]);
    }
    public function view_student($student_id){
        $id = decode_parameter($student_id);
        $user = getUser();
        $student = $this->getStudent($id);
        if(!isset($student))
            return back();

        if(isCoordinator() && strcmp($student->getCoordinatorEmail(),$user->getInfo()->getEmail()) != 0)
            return back();
        if(isManager() && strcmp($student->getManagerEmail(),$user->getInfo()->getEmail()) != 0)
            return back();

        return view(strtolower(getUserType()).".student",[
            "user"=>$user,
            "student"=>$student
        ]);
    }
    public function view_student_logbook($student_id, $week_no){
        $id = decode_parameter($student_id);
        $student = $this->getStudent($id);
        $user = getUser();
        if(!isset($student))
            return back();
        if(isCoordinator() && strcmp($student->getCoordinatorEmail(),$user->getInfo()->getEmail()) != 0)
            return back();
        if(isManager() && strcmp($student->getManagerEmail(),$user->getInfo()->getEmail()) != 0)
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
        return view(strtolower(getUserType()).".logbook",[
            "user"=>$user,
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

}
