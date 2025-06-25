<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Categorie::all();
        return view('categories.categorie', compact('all'));
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
            'libelle' => 'required|unique:categorie,nom_categorie',
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir la désignation de la categorie.",
            'libelle.unique' => "Cette désignation existe deja. Veuillez saisir une autre.",
        ];

        $request->validate($roles, $customMessages);

        $bureau = new Categorie();
        $bureau->nom_categorie = $request->libelle;
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
        $bureau = Categorie::findOrFail($id);

        $roles = [
            'libelle' => [
                'required',
                Rule::unique('categorie', 'nom_categorie')->ignore($bureau->id_categorie, 'id_categorie'),
            ],
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir la désignation de la categorie.",
            'libelle.unique' => "Cette désignation existe deja. Veuillez saisir une autre.",
        ];

        $request->validate($roles, $customMessages);

        if ($bureau->nom_categorie !== $request->libelle) {
            $bureau->nom_categorie = $request->libelle;
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
        Categorie::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été effectué");
    }
}
