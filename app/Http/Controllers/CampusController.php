<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CampusController extends Controller
{
     public function index()
    {
      return view ('Administrador.Campus.index');
    }

   
    public function create()
    {
       
       
    }

  
    public function store(Request $request)
    {
       
    }
    
    public function show(Request $request)
    {
               
    }
}
