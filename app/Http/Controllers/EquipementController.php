<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use App\Models\EtatEnum;
use App\Rules\EtatEnumRule;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'matricule' => 'required|string',
            'nom' => 'required|string',
            'type' => 'required|string',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'numero_de_serie' => 'required|string',
            'date_achat' => 'required|date',
            'etat' => ['required', new EtatEnumRule],
            'user_id' => 'required|exists:users,id',
            'emplacement_id' => 'required|exists:emplacements,id',
        ]);


        Equipement::create($validatedData);

        return redirect('/equipements');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipement $equipement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipement $equipement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipement $equipement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipement $equipement)
    {
        //
    }
}
