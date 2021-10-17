<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::get();
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
            "user_id"=>"required",
            "role"=>"required"
        ]);
        $role = new Role();
        $role->user_id = $request->user_id;
        $role->role = $request->role;
        $role->status = $request->status;
        $role->save();
        return response()->json('Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Role::findOrFail($id);
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
        $role =Role::FindOrFail($id);
        $role->user_id = $request->user_id;
        $role->role = $request->role;
        $role->status = $request->status;
        $role->save();
        return response()->json('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Role::destroy($id);
        if($isDeleted == 1){
            return response()->json("Deleted");
        }else{
            return response()->json("Can not delete empty data");
        }
    }
}
