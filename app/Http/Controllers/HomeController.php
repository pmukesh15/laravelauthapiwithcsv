<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \GuzzleHttp\Client;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUrl =  url('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    /*
    * to make login request to api
    */
    public function loginaction(Request $request){
        $client = new Client([
            "headers"=>["content-type"=>"application/json","accept"=>"application/json"],
        ]);
        $response = $client->request('POST', $this->baseUrl.'/api/signin', [
            'json' => [
                'email'  => $request->input("email"),
                'password' => $request->input("password"),
            ]
        ]);
        $responseBody =  json_decode($response->getBody(),true);
        if($responseBody['status']=="error"){
            return view('loginpage')->with('err', $responseBody['data']);
        }
        else{
            Session::put('name', $responseBody['data']['name']);
            return view('home');
        }
        
    }
    /*
    * to make register request to api
    */
    public function registeraction(Request $request){
        
        $client = new Client([
            "headers"=>["content-type"=>"application/json","accept"=>"application/json"],
        ]);
        $response = $client->request('POST', $this->baseUrl.'/api/signup', [
            'json' => [
                'name'  => $request->input("name"),
                'email'  => $request->input("email"),
                'password' => $request->input("password"),
                'confirm_password' => $request->input("password_confirmation"),
            ]
        ]);
        $responseBody =  json_decode($response->getBody(),true);
        if($responseBody['status']=="error"){
            return view('registerpage')->with('err', $responseBody['data']);
        }
        else{
            return view('loginpage')->with('registered', "Successfully registerd, please login.");
        }
    }
    /*
    * to get all imported data through api
    */
    public function viewuploads(Request $request){

        $client = new Client([
            "headers"=>["content-type"=>"application/json","accept"=>"application/json"],
        ]);
        $response = $client->request('GET', $this->baseUrl.'/api/loadimports', [
            'json' => [
                'name'  => $request->input("name"),
            ]
        ]);
        $responseBody =  json_decode($response->getBody(),true);
            return view('viewimport')->with('imports',$responseBody);
    }
    /*
    * to logout
    */
    public function logout(){
        Session::forget('name');
        return view('loginpage')->with('registered', "Logged out, please login.");
    }
}
