<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('types')->get();
        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with('types', 'dishes')->findOrFail($id);
        return response()->json($users);
    }

    /* public function filterPerType($type)
    {
        $users = User::with('types', 'dishes')->whereHas('types', function($query) use ($type) {
            $query->where('name', $type);
        })->get();
        return response()->json($users);
    } */
}
