<?php

namespace App\Http\Controllers;

use App\Traits\CoordinatorApi;
use App\Traits\StudentApi;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    use StudentApi,CoordinatorApi;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user =getUser();
        if($user ==null){
            return redirect("/login");
        }
        $pageMessage =getPageMessage();
        return view("coordinator.profile",["user"=>$user,"pageMessage"=>$pageMessage]);
    }


    public function show_update_remark_detail($student_id){
        $id = decode_parameter($student_id);

        $student = $this->getStudent($id);
        if(!isset($student))
            return back();

        $pageMessage = getPageMessage();
        return view("coordinator.remark",[
            "user"=>getUser(),
            "student"=>$student,
            "pageMessage"=>$pageMessage
        ]);
    }

    public function update_remark(Request $request){
        $id = decode_parameter($request->get("studentId"));
        $remark = $request->get("remark");

        $res = $this->updateRemark(["coordinator_remark"=>$remark],$id);
        if(!$res->ok()){
            return back()->withErrors(["message"=>"Failed: ".$res["message"]]);
        }
        setPageMessage("Remark Successfully updated");
        return redirect("/coordinator/update_remark/".encode_parameter($id));

    }

    public function show_coordinators($current){
        $user = getUser();
        $options = [
            "page"=>$current,
            "size"=>20
        ];
        $res = $this->searchCoordinators($options);
        if(!$res["status"])
            return back();

        $coordinators = $res["coordinators"];
        $pages = $res["pages"];
        return view("itf.coordinators",[
            "user"=>$user,
            "coordinators"=>$coordinators,
            "current"=>$current,
            "pages"=>$pages
        ]);

    }
    public function view_coordinator($coordinator_id){
        $user = getUser();
        $coordinator = $this->getCoordinator($coordinator_id);
        if(!isset($coordinator))
            return back();

        return view("itf.coordinator",[
            "user"=>$user,
            "coordinator"=>$coordinator
        ]);
    }


}
