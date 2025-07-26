<?php

namespace App\Http\Controllers;

use App\Mail\CourrierNotif;
use App\Mail\CourrierSigne;
use App\Models\Bureau;
use App\Models\Courrier;
use App\Models\Images;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('auth.auth-signin-cover');
        }

        if (Auth::user()->type == 'dg' || Auth::user()->type == 'admin' || Auth::user()->type == 'courrier') {
            $courrier = Courrier::join('categorie', 'courrier.categorie_id', '=', 'categorie.id_categorie')
                ->join('bureau', 'courrier.bureau_id', '=', 'bureau.id_bureau')
                ->join('users', 'courrier.user_id', '=', 'users.id')
                ->select('courrier.*', 'categorie.nom_categorie', 'bureau.nom_bureau', 'users.name', 'users.last_name')
                ->get();
        } else {
            $courrier = Courrier::join('categorie', 'courrier.categorie_id', '=', 'categorie.id_categorie')
                ->join('bureau', 'courrier.bureau_id', '=', 'bureau.id_bureau')
                ->join('users', 'courrier.user_id', '=', 'users.id')
                ->where('courrier.bureau_id', '=', Auth::user()->bureau_id)
                ->select('courrier.*', 'categorie.nom_categorie', 'bureau.nom_bureau', 'users.name', 'users.last_name')
                ->get();
        }

        return view('courriers.courrier', compact('courrier'));
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
            'numero' => 'nullable',
            'objet' => 'nullable',
            'destination' => 'required',
            'traitement' => 'required',
            'nature' => 'nullable',
            'delais' => 'nullable',
            'notes' => 'nullable',
            'file' => 'required|array',
            'file.*' => 'file|mimes:pdf,jpg,jpeg,png,doc,docx|max:20480',
        ];

        $customMessages = [
            'destination.required' => "Veuillez saisir la désignation du courrier.",
            'traitement.required' => "Veuillez sélectionner la catégorie de traitement du courrier.",
            'objet.nullable' => "Veuillez saisir l'objet du courrier.",
            'numero.nullable' => "Veuillez saisir le nnuméro du courrier.",
            'nature.nullable' => "Veuillez saisir la nature du courrier.",
            'delais.nullable' => "Veuillez sélectionner le délai de traitement.",
            'notes.nullable' => "Veuillez saisir une note sur le traitement du courrier.",
            'file.required' => "Veuillez sélectionner au moins un fichier.",
            'file.*.file' => "Chaque élément doit être un fichier valide.",
            'file.*.mimes' => "Le type de fichier est invalide (pdf, jpg, png, doc...).",
            'file.*.max' => "Le fichier ne doit pas dépasser 20 Mo.",
        ];

        $request->validate($rules, $customMessages);

        $courrier = new Courrier();
        $courrier->nombre_courrier = count($request->file);
        $courrier->numero_courrier = $request->numero ?? '';
        $courrier->objet_courrier = $request->objet ?? '';
        $courrier->nature_niveau = $request->nature ?? '';
        $courrier->note_courrier = $request->notes ?? '';
        $courrier->delai_courrier = $request->delais ?? '';
        $courrier->user_id = Auth::user()->id;
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

            // Récupérer les utilisateurs du département destinataire
            $users = User::where('bureau_id', $courrier->bureau_id)->get();

            // Envoyer un mail à chaque utilisateur
            foreach ($users as $user) {
                Mail::to($user->email)->send(new CourrierNotif($courrier, $user));
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
        $courrier = Courrier::join('categorie', 'categorie.id_categorie', '=', 'courrier.categorie_id')
            ->join('bureau', 'bureau.id_bureau', '=', 'courrier.bureau_id')
            ->join('users', 'users.id', '=', 'courrier.user_id')
            ->where('courrier.id_courrier', '=', $id)
            ->select('courrier.*', 'categorie.nom_categorie', 'bureau.nom_bureau', 'users.name', 'users.last_name')
            ->first();

        $images = Images::where('courrier_id', '=', $id)->get();

        $departement = Bureau::all();

        return view('courriers.view-courrier', compact('courrier', 'images', 'departement'));
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
        $rules = [
            'departement' => 'required',
        ];

        $customMessages = [
            'departement.required' => "Veuillez choisir le départment pour le transfert.",
        ];

        $request->validate($rules, $customMessages);

        $courrier = Courrier::findOrFail($id);
        $courrier->bureau_id = $request->departement;
        $courrier->status_courrier = 'traitement';
        $courrier->save();

        // Récupérer les utilisateurs du département destinataire
        $users = User::where('bureau_id', $courrier->bureau_id)->get();

        // Envoyer un mail à chaque utilisateur
        foreach ($users as $user) {
            Mail::to($user->email)->send(new CourrierNotif($courrier, $user));
        }

        return back()->with('succes', "Le transfert a été effectué");
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateNote(Request $request, string $id)
    {
        $rules = [
            'note' => 'required',
        ];

        $customMessages = [
            'note.required' => "Veuillez saisir la note.",
        ];

        $request->validate($rules, $customMessages);

        $courrier = Courrier::findOrFail($id);
        $courrier->note_courrier = $request->note;
        $courrier->status_courrier = 'traitement';
        $courrier->save();

        return back()->with('succes', "La note a été effectué");
    }

    /**
     * Update the specified resource in storage.
     */
    public function signer($id)
    {
        $courrier = Courrier::findOrFail($id);
        $courrier->status_courrier = 'termine';
        $courrier->save();

        // Récupérer les utilisateurs du département destinataire
        $users = User::where('bureau_id', $courrier->bureau_id)->get();

        // Envoyer un mail à chaque utilisateur
        foreach ($users as $user) {
            Mail::to($user->email)->send(new CourrierSigne($courrier, $user));
        }

        return back()->with('succes', "Le courrier a été signé");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Courrier::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été effectué");
    }
}
