<?php


namespace App\Traits;
use App\Models\Manager;
use App\Models\Student;
use Illuminate\Support\Facades\Http;
define("GET_STUDENT",env("BASE_URL")."/v1/student/");
define("SAVE_STUDENT",env("BASE_URL")."/v1/student/");
define("UPDATE_BANK",env("BASE_URL")."/v1/student/update-bank/");
define("FILL_TASK",env("BASE_URL")."/v1/student/fill-logbook/");
define("SEARCH_STUDENTS",env("BASE_URL")."/v1/student/search");
trait StudentApi
{
    public function saveStudent($data){
        $response = Http::withHeaders(getApiHeader())->post(SAVE_STUDENT,$data);
        checkAuthError($response->status());
        return $response;
    }
    public function getStudent($id){
        $response = Http::withHeaders(getApiHeader())->get(GET_STUDENT.$id);
        if(!$response->ok())
            return null;
        return new Student($response->json()["data"]);
    }
    public function updateBank($data, $id){
        $response = Http::withHeaders(getApiHeader())->put(UPDATE_BANK.$id,$data);
        checkAuthError($response->status());
        return $response;
    }
    public function fillTask($data, $id){
        $response = Http::withHeaders(getApiHeader())->put(FILL_TASK.$id,$data);
        checkAuthError($response->status());
        return $response;
    }
    public function searchStudents($options){
        $response = Http::withHeaders(getApiHeader())->get(SEARCH_STUDENTS,
            $options
        );
        checkAuthError($response->status());
        if(!$response->ok()){
            return ["status"=>false];
        }
        $students = array();
        $sts =$response->json()["data"]["items"];
        foreach($sts as $st){
            array_push($students,new Student($st));
        }
        return ["status"=>true,"students"=>$students,"pages"=>$response->json()["data"]["total_pages"]];
    }
}
