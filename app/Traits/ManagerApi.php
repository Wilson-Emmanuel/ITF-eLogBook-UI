<?php



namespace App\Traits;


use App\Models\Manager;
use App\Models\School;
use Illuminate\Support\Facades\Http;
define("GET_MANAGER",env("BASE_URL")."/v1/manager/");
define("SAVE_MANAGER",env("BASE_URL")."/v1/manager/");
define("SEARCH_MANAGER",env("BASE_URL")."/v1/manager/search");
define("SIGN_LOG",env("BASE_URL")."/v1/manager/sign-week/");

trait ManagerApi
{

    public function saveManager($data){
        $response = Http::withHeaders(getApiHeader())->post(SAVE_MANAGER,$data);
        checkAuthError($response->status());
        return $response;
    }

    public static function getCompanies($options): array{
        $response = Http::withHeaders(getApiHeader())->get(SEARCH_MANAGER,
            $options
        );
        //dd($response);
        checkAuthError($response->status());
        if(!$response->ok()){
            return array();
        }
        $companies = array();
        $coms =$response->json()["data"]["items"];
        foreach($coms as $com){
            array_push($companies,new Manager($com));
        }
        return $companies;
    }
    public function signLog($manager_id, $student_id,$options){
        $response = Http::withHeaders(getApiHeader())->put(SIGN_LOG.$manager_id."/".$student_id,$options);
        $data =$response->json();
        if(!$response->ok()){
            return ["status"=>false,"message"=>$data["message"]];
        }
            return ["status"=>true,"message"=>$data["message"]];
    }
}
