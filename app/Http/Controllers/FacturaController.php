<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('facturas.index', [
            'facturas'=>Factura::all(),
            'usuarios'=>User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facturas.create', [
            'articulos'=>Articulo::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factura=DB::table('facturas');

        $factura->insert([
            'numero'=> $request->numero,
            'user_id'=> Auth::id(),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        dd();
        // foreach ($request->articulos as $articulo) {
        // $factura->articulos()->attach($articulo->id);
        // }
        session()->flash('exito', 'Factura creado correctamente.');
        return redirect()->route('facturas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
