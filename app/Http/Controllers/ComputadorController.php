<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputadorRequest;
use App\Models\Computador;
use Illuminate\Http\Request;

class ComputadorController extends Controller
{
    public function index()
    {
        return View('computador.index')->with('ComputadorCollection', Computador::paginate(10));
    }
   
    public function create()
    {
        return View('computador.create');
    }

    public function store(ComputadorRequest $request)
    {
        Computador::create($request->all());
        return redirect('/computadores');
    }

    public function show(Computador $computador)
    {
        return View('computador.show')->with('objetoComputador', $computador);
    }

    public function edit(Computador $computador)
    {
        return View('computador.edit')->with('objetoComputador',$computador);
    }

    public function update(ComputadorRequest $request, Computador $computador)
    {
        $computador->update($request->all());
        return redirect('/computadores');
    }

    public function destroy(Computador $computador)
    {
        $computador->delete();
        return redirect('/computadores');
    }
}
