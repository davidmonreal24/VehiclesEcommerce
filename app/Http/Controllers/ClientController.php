<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as ClientRequest;
use GuzzleHttp\Client;
use Debugbar;

class ClientController extends Controller
{
    public function index()
    {
        $requests = ClientRequest::orderBy('id', 'desc')->paginate(5);
        return view('client.requests.index', compact('requests'));
    }

    public function create()
    {
        $clientRequest = new ClientRequest();
        $vehicles = \App\Models\Vehicle::all(); // Obtener todos los vehículos

        $clientRequest->id_user = auth()->user()->id;
        
        $clientRequest->estado = 'pendiente';
        // $clientRequest->save();
        return view('client.requests.create', compact('clientRequest', 'vehicles'));
    }


    public function store(Request $request)
    {
        // dd($request->id_user);
        request()->validate(ClientRequest::$rules);
        // dd('validacion exitosa');

        
        $clientRequest = new ClientRequest();
        $clientRequest->id_user = auth()->user()->id;
        // dd($clientRequest);
        // $clientRequest->id_user = auth()->user()->id;
        $clientRequest->id_vehicle = $request->id_vehicle;
        $clientRequest->estado = $request->estado;

        $clientRequest->save();

        return redirect('client.requests.index')->with('success', 'Solicitud guardada!');
    }

    public function show($id)
    {
        $clientRequest = ClientRequest::find($id);
        return view('client.show', compact('clientRequest'));
    }

    public function edit($id)
    {
        $clientRequest = ClientRequest::find($id);
        return view('client.requests.edit', compact('clientRequest'));
    }

    public function update(Request $request, ClientRequest $clientRequest)
    {
        $datosValidados = $request->validate(ClientRequest::$rules);

        $clientRequest->update($datosValidados);

        return redirect('client.requests.index')->with('success', 'Solicitud actualizada!');
    }

    public function destroy($id)
    {
        $clientRequest = ClientRequest::find($id);
        $clientRequest->delete();

        return redirect('client.requests.index')->with('success', 'Solicitud eliminada!');
    }
}
