<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carrito;
use App\Models\Factura;
use App\Models\Linea;
use App\Models\User;
use Livewire\Attributes\Validate;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carritos = auth()->user()->carritos->sortByDesc('cantidad');

        return view("carritos.index", ["carritos" => $carritos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("carritos.create", ["zapato_id" => $request->zapato_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:0',
        ]);

        $carrito = Carrito::where("user_id", auth()->user()->id)
                            ->where("zapato_id", $request->zapato_id)
                            ->first();

        if (!$carrito) {
            Carrito::create([
                "user_id" => auth()->user()->id,
                "zapato_id" => $request->zapato_id,
                "cantidad" => $request->cantidad
            ]);
        } else {
            $carrito->update([
                "cantidad" => $carrito->cantidad + $request->cantidad
            ]);
        }

        return redirect()->route("zapatos.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrito $carrito)
    {
        if($request->tipo == "-"){
            $carrito->update([
            "cantidad" => $carrito->cantidad - 1
            ]);
        }else if($request->tipo == "+"){
                $carrito->update([
                    "cantidad" => $carrito->cantidad + 1
                ]);
        }
        if ($carrito->cantidad <= 0){
            $carrito->delete();
        }
        return redirect()->route("carritos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrito $carrito)
    {
        $carrito->delete();
        return redirect()->route("carritos.index");
    }
    public function vaciar(User $user)
    {
        $carritos = Carrito::where('user_id', auth()->user()->id)->get();
        foreach($carritos as $carrito){
            $carrito->delete();
        }
        return redirect()->route("carritos.index");
    }
    public function comprar(User $user)
    {
        $carritos = Carrito::where('user_id', auth()->user()->id)->get();

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
        foreach($carritos as $carrito){
            $carrito->delete();
        }
        return redirect()->route("facturas.index");



    }

}
