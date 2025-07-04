<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courriers.courrier');
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
        $rules = [
            'destination' => 'required',
            'traitement' => 'required',
            'nature' => 'required',
            'delais' => 'required',
            'notes' => 'required',
            'file' => 'required|array',
            'file.*' => 'file|mimes:pdf,jpg,jpeg,png,doc,docx|max:20480',
        ];

        $customMessages = [
            'destination.required' => "Veuillez saisir la désignation du courrier.",
            'traitement.required' => "Veuillez sélectionner la catégorie de traitement du courrier.",
            'nature.required' => "Veuillez saisir la nature du courrier.",
            'delais.required' => "Veuillez sélectionner le délai de traitement.",
            'notes.required' => "Veuillez saisir une note sur le traitement du courrier.",
            'file.required' => "Veuillez sélectionner au moins un fichier.",
            'file.*.file' => "Chaque élément doit être un fichier valide.",
            'file.*.mimes' => "Le type de fichier est invalide (pdf, jpg, png, doc...).",
            'file.*.max' => "Le fichier ne doit pas dépasser 20 Mo.",
        ];

        $request->validate($rules, $customMessages);

        $courrier = new Courrier();
        $courrier->nombre_courrier = count($request->file);
        $courrier->nature_niveau = $request->nature;
        $courrier->note_courrier = $request->notes;
        $courrier->delai_courrier = $request->delais;
        $courrier->user_id = 1;
        $courrier->bureau_id = $request->destination;
        $courrier->categorie_id = $request->traitement;
        if ($courrier->save()) {

            foreach ($request->file('file') as $file) {
                $filename = 'file_courrier_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/courriers'), $filename);

                $image = new Images();
                $image->fichier_image = $filename;
                $image->courrier_id = $courrier->id_courrier;
                $image->save();
            }

            return back()->with('succes',  "Le courrier a été initié");
        } else {
            return back()->withErrors(["Impossible d'initier le courrier. Veuillez réessayer!!"]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
