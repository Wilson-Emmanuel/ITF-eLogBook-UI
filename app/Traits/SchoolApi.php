<?php


namespace App\Traits;

use Illuminate\Support\Facades\Http;

define("NEW_SCHOOL",env("BASE_URL")."/v1/school/");

trait SchoolApi
{
    public function addSchool($data){
        $response = Http::withHeaders(getApiHeader())->post(NEW_SCHOOL,$data);
        checkAuthError($response->status());
        return $response;
    }
}
