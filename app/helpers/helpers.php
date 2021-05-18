<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


if (!function_exists('encode_parameter')) {
    function encode_parameter($param): string
    {
        return Crypt::encrypt($param);
    }
}
if (!function_exists('decode_parameter')) {
    function decode_parameter($param): string
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
    return  Session::has("token") && Session::has("userType") && Session::has("userId");
}
function getUserType(){
    return session("userType",null);
}
function updateUserType($userType){
    session(["userType",$userType]);
}
function getToken(){
    return session("token",null);
}
function updateToken($token){
    session(["token",$token]);
}
function getUser(){
    return session("user",null);
}
function updateUser($user){
    session(["user",$user]);
}
function getUserId(){
    return session("userId",null);
}
function updateUserId($id){
    session(["userId",$id]);
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



