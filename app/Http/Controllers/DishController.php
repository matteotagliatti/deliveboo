<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\User;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('user_id', Auth::user()->id)->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $this->validate($request, [
            'nome' => 'required|string|max:100',
            'descrizione' => 'required|max:250|min:5',
            'ingredienti' => 'required|max:250',
            'prezzo' => 'numeric|required',
        ], [
            'nome.max' => 'Il nome è troppo lungo',
            'descrizione.max' => 'La descrizione è troppo lunga',
            'descrizione.min' => 'La descrizione è troppo corta',
            'ingredienti.max' => 'La descrizione è troppo lunga',
        ]);

        $newDish = new Dish();
        $newDish->fill($data);
        $newDish->save();

        return redirect()->route('dishes.index')->with('message', 'Piatto creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $this->validate($request, [
            'nome' => 'required|string|max:100',
            'descrizione' => 'required|max:250|min:5',
            'ingredienti' => 'required|max:250',
            'prezzo' => 'numeric|required',
        ], [
            'nome.max' => 'Il nome è troppo lungo',
            'descrizione.max' => 'La descrizione è troppo lunga',
            'descrizione.min' => 'La descrizione è troppo corta',
            'ingredienti.max' => 'La descrizione è troppo lunga',
        ]);

        $dish->fill($data);
        $dish->save();

        return redirect()->route('dishes.index')->with('message', 'Piatto aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index')->with('delete-message', 'Il piatto ' . $dish['nome'] . ' ' . 'è eliminato con successo');
        
    }
}
