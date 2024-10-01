<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    //! crear metodos para el controlador menos Update, destroy y store
    public function index()
    {
        return view('visits.index');
    }

    public function create()
    {
        return view('visits.create');
    }

    public function show()
    {
        return view('visits.show');
    }

    public function edit()
    {
        return view('visits.edit');
    }
}
