<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Debugbar;
use App\Models\RequestPurchase;
use App\Models\Vehicle;


class ClientController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->paginate(10);
        $requests = RequestPurchase::orderBy('id', 'desc')->paginate(10);
        return view('client.requests.index', compact('requests', 'vehicles'));
    }

    public function create()
    {
        $clientRequest = new RequestPurchase();
        $vehicles = \App\Models\Vehicle::all(); // Obtener todos los vehículos

        // $clientRequest->id_user = auth()->user()->id;

        // $clientRequest->id_vehicle = $vehicles->first()->id;
        $clientRequest->estado = 'pendiente';
        // $clientRequest->save();
        return view('client.requests.create', compact('clientRequest', 'vehicles'));
    }


    public function store(Request $request)
    {
        request()->validate(RequestPurchase::$rules);

        $clientRequest = RequestPurchase::create([
            'id_user' => auth()->user()->id,
            'id_vehicle' => $request->id_vehicle,
            'estado' => $request->estado,
        ]);

        return redirect()->route('client.requests.index')->with('success', 'Solicitud guardada!');
    }


    public function show($id)
    {
        $clientRequest = RequestPurchase::find($id);
        return view('client.show', compact('clientRequest'));
    }

    public function edit($id)
    {
        $clientRequest = RequestPurchase::find($id);
        // dd($clientRequest);
        $vehicles = Vehicle::all();
        return view('client.requests.edit', compact('clientRequest', 'vehicles'));
    }

    public function update(Request $request, RequestPurchase $clientRequest)
    {
        $datosValidados = $request->validate(RequestPurchase::$rules);

        $clientRequest->update($datosValidados);

        return redirect('client.requests.index')->with('success', 'Solicitud actualizada!');
    }

    public function destroy($id)
    {
        $clientRequest = RequestPurchase::find($id);
        $clientRequest->delete();

        return redirect('client.requests.index')->with('success', 'Solicitud eliminada!');
    }
}
