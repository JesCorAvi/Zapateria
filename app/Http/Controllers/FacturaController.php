<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Linea;
use App\Models\Carrito;



class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $facturas = Factura::all()->where("user_id", auth()->user()->id);

        return view("facturas.index", ["facturas" => $facturas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Carrito $carritos)
    {
        $factura = Factura::create([
            "user_id" => auth()->user()->id,
            "created_at" => now(),
        ]);
        foreach($carritos as $carrito){
            Linea::create([
                "factura_id" => $factura->id,
                "zapato_id" => $carrito->zapato->id,
                "cantidad" => $carrito->cantidad
            ]);
        }
        return redirect()->route("facturas.index");

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
