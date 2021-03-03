<?php

namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    /**
     * save imported data to db
     *
     * @param  array  $request
     * @return json $response
     */
    public function signup(Request $request)
    {
        $name       = $request->input("name");
        $email      = $request->input("email");
        $password   = $request->input("password");
        $cpassword  = $request->input("confirm_password");
        $arrErrors  = [];
        if($name==""){
            $arrErrors[]  = "name required";
        }
        if($email==""){
            $arrErrors[]  = "email required";
        }
        if($password==""){
            $arrErrors[]  = "password required";
        }
        if($arrErrors){
            return array("status"=>"error","data"=>$arrErrors);
        }
        $arrErrors = [];
        if($name!="" && $email!="" && $password!=""){
            if($cpassword!="" && $cpassword!=$password){
                $arrErrors[] = "password mismatch";
            }
            $intUserCount = User::where('email', '=', $email)->count();
            if($intUserCount>0){
                $arrErrors[] = "email already registered";
            }
            if($arrErrors){
                return array("status"=>"error","data"=>$arrErrors);
            }
            User::create([
                'name' =>$name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
            return array("status"=>"success","data"=>"");
        }

    }
    /**
     * save imported data to db
     *
     * @param  array  $request
     * @return json $response
     */
    public function signin(Request $request)
    {
        $email    = $request->input("email");
        $password = $request->input("password");
        $arrErrors  = [];

        if($email==""){
            $arrErrors[]  = "email required";
        }
        if($password==""){
            $arrErrors[]  = "password required";
        }
        if($arrErrors){
            return json_encode(array("status"=>"error","data"=>$arrErrors));
        }
        $arrErrors = [];
        $intUserCount = User::where('email', '=', $email);
        if($intUserCount->count()>0){
            $userData = $intUserCount->first();
            if (Hash::check($password, $userData->password)) {
                return json_encode(array("status"=>"success","data"=>$userData));
            }else{
                $arrErrors[] = "invalid credentials";
            }
        }
        else{
            $arrErrors[] = "invalid credentials";
        }
        if($arrErrors){
            return json_encode(array("status"=>"error","data"=>$arrErrors));
        }
    }
    /*
    * getting all imported data
    */
    public function loadimports(Request $request)
    {
      $query = DB::table('import_csv')->select('product_name','price','sku','description')->get();
      return $query;
    }
}
