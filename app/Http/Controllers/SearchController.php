<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\User;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('guests.search', compact('types'));
    }

    public function update(Request $request)
    {
        $types = Type::all();
        /* $data = $request->types; */
        // Dove un user ha il relativo type selezionato
        /* $users = User::where('id', $data)->get(); */
        

        $choosenType = $request->types;

        $users = User::all();
        $usersArray = [];

        foreach ($users as $user) {
            foreach ($user->types as $type) {
                if ($type->id == $choosenType) {
                    array_push($usersArray, $user);
                    
                }
            }
        }
        
        return view('guests.search2', compact('usersArray', 'types', 'choosenType'));
    }
}