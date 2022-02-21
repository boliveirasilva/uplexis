<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarroRequest;
use App\Services\CarroService;
use App\Models\Carro;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarroController extends Controller
{
    private CarroService $service;

    public function __construct(CarroService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $carros = $this->service->listAll();
        return view('car.list', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(array $imports = []): View
    {
        return view('car.create', $imports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarroRequest $request): View
    {
        $imports = $this->service->store($request->validated());
        return $this->create(compact('imports'));
        // return to_route('carro.create', ['imports' => $imports]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carro $carro): RedirectResponse
    {
        $this->service->destroy($carro);
        return to_route('carro.index');
    }
}
