<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('auth.auth-signin-cover');
        }

        $bureau = Bureau::all();
        $all = User::join('bureau', 'users.bureau_id', '=', 'bureau.id_bureau')
            ->select('users.*', 'bureau.nom_bureau')
            ->get();
        return view('user.users', compact('all', 'bureau'));
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
            'nom' => 'required',
            'prenom' => 'required',
            'departement' => 'required',
            'password' => 'required',
            'type' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'nullable|unique:users,email',
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom.",
            'prenom.required' => "Veuillez saisir le prénom.",
            'departement.required' => "Veuillez sélectionner le departement.",
            'password.required' => "Veuillez saisir son mot de passe.",
            'type.required' => "Veuillez sélectionner le type.",
            'email.required' => "Veuillez saisir son adresse email.",
            'email.unique' => "Cette adresse email existe deja. Veuillez saisir une autre.",
            'phone.unique' => "Ce numero de tелефone existe deja. Veuillez saisir une autre.",
        ];

        $request->validate($roles, $customMessages);

        $user = new User();
        $user->name = $request->nom;
        $user->last_name = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->bureau_id = $request->departement;
        $user->type = $request->type;
        $user->phone = $request->phone;
        if ($user->save()) {
            return back()->with('succes',  "Vous avez ajouter " . $request->nom);
        } else {
            return back()->withErrors(["Impossible d'ajouter " . $request->nom . ". Veuillez réessayer!!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('user.profile', compact('user'));
    }

    public function updateUser(Request $request, string $id)
    {
        $ser = User::findOrFail($id);

        $roles = [
            'nom' => 'required',
            'prenom' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable',
            'email' => ['required', Rule::unique('users', 'email')->ignore($ser->id, 'id'),],
            'phone' => ['nullable', Rule::unique('users', 'phone')->ignore($ser->id, 'id'),],
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom.",
            'prenom.required' => "Veuillez saisir le prénom.",
            'email.required' => "Veuillez saisir son adresse email.",
            'email.unique' => "Cette adresse email existe deja. Veuillez saisir une autre.",
            'phone.unique' => "Ce numero de téléphone existe deja. Veuillez saisir une autre.",
        ];

        $request->validate($roles, $customMessages);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('users'), $imageName);
            $ser->photo = $imageName;
        }

        if ($ser->email !== $request->email) {
            $ser->email = $request->email;
        }
        if ($ser->phone !== $request->phone) {
            $ser->phone = $request->phone;
        }
        if (!empty($request->password)) {
            $ser->password = Hash::make($request->password);
        }

        $ser->name = $request->nom;
        $ser->last_name = $request->prenom;

        if ($ser->save()) {
            return back()->with('succes', "Vous avez modifier avec succès.");
        } else {
            return back()->withErrors(["Problème lors de la modification. Veuillez réessayer!!"]);
        }
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
        $ser = User::findOrFail($id);

        $roles = [
            'nom' => 'required',
            'prenom' => 'required',
            'departement' => 'required',
            'password' => 'nullable',
            'type' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($ser->id, 'id'),],
            'phone' => ['nullable', Rule::unique('users', 'phone')->ignore($ser->id, 'id'),],
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom.",
            'prenom.required' => "Veuillez saisir le prénom.",
            'departement.required' => "Veuillez sélectionner le departement.",
            'type.required' => "Veuillez sélectionner le type.",
            'email.required' => "Veuillez saisir son adresse email.",
            'email.unique' => "Cette adresse email existe deja. Veuillez saisir une autre.",
            'phone.unique' => "Ce numero de tелефone existe deja. Veuillez saisir une autre.",
        ];

        $request->validate($roles, $customMessages);

        if ($ser->email !== $request->email) {
            $ser->email = $request->email;
        }
        if ($ser->phone !== $request->phone) {
            $ser->phone = $request->phone;
        }
        if (!empty($request->password)) {
            $ser->password = Hash::make($request->password);
        }

        $ser->name = $request->nom;
        $ser->last_name = $request->prenom;
        $ser->bureau_id = $request->departement;
        $ser->type = $request->type;

        if ($ser->save()) {
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
        User::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été effectué");
    }
}
