<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profile::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>"image|mimes:jpg,jpeg,png,gif,PNG|max:1999",
            'city'=>"min:1|max:90"
        ]);
        //Move to storage
        $request->file("image")->store("public/images");
        //Get original image name
        $originalName = $request->file("image")->getClientOriginalName();
        //
        $profile = new Profile();
        $profile->user_id = $request->user_id;
        $profile->image = $request->file('image')->hashName();
        $profile->city = $request->city;
        $profile->save();
        return response()->json("Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Profile::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->image = $request->image;
        $profile->city = $request->city;
        $profile->save();
        return response()->json("Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::destroy($id);
        if($profile == 1){
            return response()->json("Deleted");
        }else{
            return response()->json("Can not delete empty data");
        }
    }
}
