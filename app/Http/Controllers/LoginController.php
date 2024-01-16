<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {   
        $credentials= ["email" => $request->email, "password" => $request->password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route("profiles.index")->with("success","you logged in successfully ".$request->email);
        }else{
            return back()->withErrors([
                "email"=>"email not valid"
            ]);
        }
    }
    public function logout(){
        Auth::logout();
        session()->flush();
       return to_route("home")->with('success', 'You have been logged out.');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
