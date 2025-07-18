<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Hash;
use App\Models\User;


class GestionarUsuariosController extends Controller
{
    public function index()
    {
        // Trae todos los registros de la tabla 'users'
        $usuarios = User::all(); 
        return view('Administrador.GestionarUsuarios.index', compact('usuarios'));
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
        // Validar los datos enviados por el formulario

        // Validacion de datos ingresados por formulario de AGREGAR USUARIOS
        $request->validate([
            'numero_cuenta' => ['required','string','max:13'],
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => ['required', 'string', 'max:12'],
            'facultad' => ['required', 'string', 'max:50'],
            'campus' => ['required', 'string', 'max:50'],

        
        ]);

        //Ingresando datos en las respectivas Tablas

        //TABLA USERS
        User::create([
            'numero_cuenta' => $request->numero_cuenta,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'facultad' => $request->facultad,
            'campus' => $request->campus,

        ]);

        // return view('Administrador.GestionarUsuarios.index');
        return redirect()->route('GestionarUsuarios.index')->with('success', 'Usuario creado correctamente.');

    }



}
