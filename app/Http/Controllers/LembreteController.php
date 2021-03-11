<?php

namespace App\Http\Controllers;

use App\Lembrete;
use Illuminate\Http\Request;

class LembreteController extends Controller
{
    public function index()
    {
        $registers = Lembrete::paginate(5);
        return view('welcome', compact('registers'));
    }

    public function store(Request $request)
    {
        $registro = new Lembrete($request->all());
        $registro->save();
        return redirect()->route('lembrete.index');
    }

    public function create()
    {
        return view('form');
    }

    public function show(Lembrete $lembrete)
    {
        //
    }


    public function edit($id)
    {
        $register = Lembrete::find($id);
        return view('form', compact('register', 'id'));
    }


    public function update(Request $request, $id)
    {
        $register = Lembrete::find($id);
        $register->update($request->all());

        return redirect()->route('lembrete.index');
    }


    public function destroy($id)
    {
        Lembrete::find($id)->delete();
        return redirect()->route('lembrete.index');
    }
}
