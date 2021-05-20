<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


if (!function_exists('encode_parameter')) {
    function encode_parameter($param)
    {
        return Crypt::encrypt($param);
    }
}
if (!function_exists('decode_parameter')) {
    function decode_parameter($param)
    {
        return Crypt::decrypt($param);
    }
}
function set_session_data($key, $value){
      //$value = $request->session()->get('key');
    /*
     * $request->session()->put('key', 'value');
     * $value = $request->session()->get('key', function () {
    return 'default';
    // Retrieve a piece of data from the session...
    $value = session('key');

    // Specifying a default value...
    $value = session('key', 'default');

    // Store a piece of data in the session...
    session(['key' => 'value']);
});
     */
}
function isLoggedIn():bool{
    return  Session::has("user") && Session::has("token") && Session::has("userType") && Session::has("userId");
}
function getUserType(){
    return session("userType",null);
}
function updateUserType($userType){
    session(["userType"=>$userType]);
}
function getToken(){
    return session("token",null);
}
function updateToken($token){
    session(["token"=>$token]);
}
function getUser(){
    return session("user",null);
}
function updateUser($user){
    session(["user"=>$user]);
}
function getUserId(){
    return session("userId",null);
}
function updateUserId($id){
    session(["userId"=>$id]);
}
function updateStates($states){
    \session(["states"=>$states]);
}
function getStates(){
    return \session("states",array());
}
function getITFUserType():string{
    return "ITF";
}
function getStudentUserType():string{
    return "STUDENT";
}
function getCoordinatorUserType():string{
    return "COORDINATOR";
}
function getManagerUserType():string{
    return "MANAGER";
}
function getApiHeader(){
    return ["Authorization"=>"Bearer ".session("token"),"x-client-request-key"=>env("API_KEY")];
}
function getPageMessage(){
    $pageMessage = \session("pageMessage");
    if(Session::has("pageMessage"))
        Session::forget("pageMessage");
    return $pageMessage;
}
function setPageMessage($pageMessage){
    Session::put("pageMessage",$pageMessage);
}
function clearSession(){
    Session::forget(["userType","user","userId","token"]);
}
function checkAuthError($status){
    if($status == 401){
        return redirect("/login");
    }
}
function isStudent(){
    return strcmp(strtolower(getUserType()),strtolower(getStudentUserType())) == 0;
}
function isManager(){
    return strcmp(strtolower(getUserType()),strtolower(getManagerUserType())) == 0;
}
function isCoordinator(){
    return strcmp(strtolower(getUserType()),strtolower(getCoordinatorUserType())) == 0;
}
function isAdmin(){
    return strcmp(strtolower(getUserType()),strtolower(getITFUserType())) == 0;
}




