<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
            [
                'name' => 'Alice Smith',
                'email' => 'alice@example.com',
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob@example.com',
            ],
            [
                'name' => 'Eva Brown',
                'email' => 'eva@example.com',
            ],
        ];
        
        
        return view("home",[
            "users"=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

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
