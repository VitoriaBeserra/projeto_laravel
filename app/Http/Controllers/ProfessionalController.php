<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professional;

class ProfessionalController extends Controller
{
    public function index()
    {
        $professionals = Professional::orderby('id', 'desc')->get();
        $total = Professional::count();
        return view('admin.professional.home', compact(['professionals' ,'total']));
    }

    public function create()
    {
        return view('admin.professional.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'cpf' => 'required',
        ]);
        $data = Professional::create($validation);
        if ($data) {
            session()->flash('success', 'Profissional adicionado com sucesso!');
            return redirect(route('admin/professionals'));
        } else {
            session()->flash('error', 'Algum problema ocorreu');
            return redirect(route('admin.professionals/create'));
        }
    }

    public function edit($id)
    {
        $professionals = Professional::findOrFail($id);
        return view('admin.professional.update', compact('professionals'));
    }

    public function delete($id)
    {
        $professionals = Professional::findOrFail($id)->delete();
        if ($professionals) {
            session()->flash('success', 'Profissional deletado com sucesso');
            return redirect(route('admin/professionals'));
        } else {
            session()->flash('error', 'Profissional não foi deletado com sucesso');
            return redirect(route('admin/professionals'));
        }
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'cpf' => 'required',
        ]);

        $professionals = Professional::findOrFail($id);
        $name = $request->name;
        $email = $request->email;
        $telephone = $request->telephone;
        $cpf = $request->cpf;

        $professionals->name = $name;
        $professionals->email = $email;
        $professionals->telephone = $telephone;
        $professionals->cpf = $cpf;
        $data = $professionals->save();
        if ($data) {
            session()->flash('success', 'Produto editado com sucesso!');
            return redirect(route('admin/professionals'));
        } else {
            session()->flash('error', 'Algum problema aconteceu!');
            return redirect(route('admin/professionals/update'));
        }
    }
}

