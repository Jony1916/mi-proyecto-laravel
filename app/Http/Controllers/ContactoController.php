<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contacto::all();
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
        return Contacto::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Contacto::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->update($request->all());

        return $contacto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return 204;
    }
    public function detalles($id)
    {
        return Contacto::with('telefonos', 'emails', 'direcciones')->findOrFail($id);
    }

    public function filtrarPorCiudad($ciudad)
    {
        return Contacto::whereHas('direcciones', function ($query) use ($ciudad) {
            $query->where('ciudad', $ciudad);
        })->get();
    }
}
