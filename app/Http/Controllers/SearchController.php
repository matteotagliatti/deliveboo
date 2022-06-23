<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\User;

class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $data = null;
        $users = null;
        return view('guests.search', compact('types', 'data', 'users'));
    }

    public function update(Request $request)
    {
        $types = Type::all();
        $data = $request->types;
        // Dove un user ha il relativo type selezionato
        $users = User::where('id', $data)->get();
        return view('guests.search', compact('types', 'data', 'users'));
    }
}
