<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use PDF;
use Excel;
use App\Exports\VehiclesExport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function downloadMostSoldPDF()
    {
        // Obtener los vehículos más vendidos basados en la cantidad de solicitudes
        $mostSoldVehicles = Vehicle::withCount('Requests')
            ->orderBy('estado', 'desc')
            ->take(10)
            ->get();

        // Generar el PDF
        $pdf = PDF::loadView('admin.vehicles.pdf-most-sold', compact('mostSoldVehicles'));

        // Descargar el PDF
        return $pdf->download('most_sold_vehicles.pdf');
    }

    public function downloadAllSoldPDF()
    {
        $soldVehicles = Vehicle::has('Requests')->get();

        // Generar el PDF
        $pdf = PDF::loadView('admin.vehicles.pdf-all-sold', compact('soldVehicles'));

        // Descargar el PDF
        return $pdf->download('all_sold_vehicles.pdf');
    }

    public function exportToExcel()
    {
        return Excel::download(new VehiclesExport, 'vehicles.xlsx');
    }

    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->paginate(5);
        // dd($vehicles);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        // dd('entrando al create');
        $vehicle = new Vehicle();
        // dd($vehicle);
        // dd($vehicles);
        return view('admin.vehicles.create', compact('vehicle'));
    }

    public function store(Request $request)
    {
        // Valida tus campos aquí, incluyendo el campo del modelo 3D (puedes agregar reglas específicas para archivos)

        $request->validate([
            'nombre' => 'required',
            // Otras reglas de validación
            'modelo3d' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Lógica para almacenar el archivo
        if ($request->hasFile('modelo3d')) {
            $fileName = $request->file('modelo3d')->store('modelos3d', 'public');
        }
        

        // Ahora puedes crear el vehículo con el nombre y el nombre del archivo de modelo 3D
        $vehicle = new Vehicle();
        $vehicle->nombre = $request->nombre;
        $vehicle->tipo = $request->tipo;
        $vehicle->capacidad = $request->capacidad;
        $vehicle->color = $request->color;
        $vehicle->precio = $request->precio;
        $vehicle->estado = $request->estado;

        // Otros campos del vehículo
        $vehicle->modelo3d = $fileName; // Guarda el nombre del archivo en la base de datos

        $vehicle->save();

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehículo agregado correctamente.');
    }


    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $datosValidados = $request->validate(Vehicle::$rules);

        Log::info('Datos validados: ' . json_encode($vehicle->toArray()));

        $vehicle->update($datosValidados);

        Log::info('Datos después de la actualización: ' . json_encode($vehicle->toArray()));

        // dd($request->all());
        return redirect()->route('admin.vehicles.index')->with('success', 'Vehículo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index')->with('success', 'Vehículo eliminado exitosamente.');
    }
}
