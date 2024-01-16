<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        
        // return response()->json(["profiles"=>$profiles]);
        return response()->json($profiles);

        // Use the API resource to transform the data
        // return response()->json(ProfileResource::collection($profiles));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|unique:profiles,name',
            'email' => 'required|email|unique:profiles,email',
            'password' => 'required|min:3|max:20',
            'bio' => "required",
            'image' => "image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        if ($request->hasFile("image")) {
            $formFields['image'] = $request->file("image")->store("images", "public");
        }
        $formFields["password"] = Hash::make($formFields["password"]);
        // dd($formFields);
        Profile::create($formFields);
        return response()->json(['message' => 'Profile created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return response()->json($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {   
        $formFields = $request->validate([
            'name' => 'required|unique:profiles,name,' . $profile->id,
            'email' => 'required|email|unique:profiles,email,' . $profile->id,
            'password' => 'required|min:3|max:20',
            'bio' => 'required',
            'image' => "image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        if ($request->hasFile("image")) {
            dump($request->hasFile("image"));
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $formFields['image'] = $request->file("image")->store('images', "public");
        }

        $formFields["password"] = Hash::make($formFields["password"]);
        $profile->fill($formFields);
        $profile->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->json(['message' => 'Profile deleted successfully']);
    }
}
