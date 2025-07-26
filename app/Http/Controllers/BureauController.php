<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('auth.auth-signin-cover');
        }

        $all = Bureau::all();
        return view('departements.bureau', compact('all'));
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
        $roles = [
            'libelle' => 'required|unique:bureau,nom_bureau',
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir la désignation du département.",
            'libelle.unique' => "Cette désignation existe deja. Veuillez saisir une autre.",
        ];

        $request->validate($roles, $customMessages);

        $bureau = new Bureau();
        $bureau->nom_bureau = $request->libelle;
        if ($bureau->save()) {
            return back()->with('succes',  "Vous avez ajouter " . $request->libelle);
        } else {
            return back()->withErrors(["Impossible d'ajouter " . $request->libelle . ". Veuillez réessayer!!"]);
        }
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
        $bureau = Bureau::findOrFail($id);

        $roles = [
            'libelle' => [
                'required',
                Rule::unique('bureau', 'nom_bureau')->ignore($bureau->id_bureau, 'id_bureau'),
            ],
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir la désignation du département.",
            'libelle.unique' => "Cette désignation existe deja. Veuillez saisir une autre.",
        ];

        $request->validate($roles, $customMessages);

        if ($bureau->nom_bureau !== $request->libelle) {
            $bureau->nom_bureau = $request->libelle;
        }

        if ($bureau->save()) {
            return back()->with('succes', "Vous avez modifier avec succès.");
        } else {
            return back()->withErrors(["Problème lors de la modification. Veuillez réessayer!!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bureau::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été effectué");
    }
}
