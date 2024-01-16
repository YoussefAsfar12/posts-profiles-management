<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{   

    public function __construct()
    {
        // Apply 'auth' middleware to all methods in this controller
        // $this->middleware('auth');
        // Apply 'auth' middleware only to the specified methods
        // $this->middleware('auth')->only(['edit', 'update', 'destroy']);
        
        // Apply 'auth' middleware to all methods except 'index' and 'show'
        // $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $profiles= Profile::paginate(10);
        return view("profile.profiles",[
            "profiles"=>$profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("profile.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $formFields=$request->validate([
            'name' => 'required|unique:profiles,name',
            'email' => 'required|email|unique:profiles,email',
            'password' => 'required|min:3|max:20|confirmed',
            'bio'=>"required",
            'image'=>"image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        if($request->hasFile("image")){
            $formFields['image']=$request->file("image")->store("images","public");
        }
        // $imageName= basename($imagePath);
        // dd($imageName);
        $formFields["password"]=Hash::make($formFields["password"]);
        Profile::create($formFields);
        return redirect()->route('home')->with("success","Profile created successfully");
    }
    /**
     * Display the specified resource.
     */
    // public function show(Request $request)
    // {   
    //     $profile=Profile::findOrFail($request->id);
    //     return view("profile.show",compact("profile"));
    // }
    public function show(Profile $profile)
    {   
        return view("profile.show",compact("profile"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view("profile.edit",compact("profile"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $formFields = $request->validate([
            // Validate the 'name' field to ensure it is required and unique in the 'profiles' table, excluding the current profile by ID
            'name' => 'required|unique:profiles,name,'. $profile->id,
            'email' => 'required|email|unique:profiles,email,'. $profile->id,
            'password' => 'required|min:3|max:20|confirmed',
            'bio' => 'required',
            'image'=>"image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        if($request->hasFile("image")){
            //if user uploaded an image , the old image will be deleted
            dump($request->hasFile("image"));
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $formFields['image']=$request->file("image")->store('images',"public");
        }
        $formFields["password"] = Hash::make($formFields["password"]);
    
        // Fill the profile model with the validated form fields
        $profile->fill($formFields);
    
        // Save the updated profile to the database
        $profile->save();

        return redirect()->route("profiles.show", $profile)->with("success", "Profile updated successfully");
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return to_route("profiles.index")->with("success", $profile->name." deleted successfully");
    }
}
