<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderby('id', 'desc')->get();
        $total = Client::count();
        return view('admin.client.home', compact(['clients' ,'total']));
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'cpf' => 'required',
            'pet' => 'required',
        ]);
        $data = Client::create($validation);
        if ($data) {
            session()->flash('success', 'Produto adicionado com sucesso!');
            return redirect(route('admin/clients'));
        } else {
            session()->flash('error', 'Algum problema ocorreu');
            return redirect(route('admin.clients/create'));
        }
    }

    public function edit($id)
    {
        $clients = Client::findOrFail($id);
        return view('admin.client.update', compact('clients'));
    }

    public function delete($id)
    {
        $clients = Client::findOrFail($id)->delete();
        if ($clients) {
            session()->flash('success', 'Cliente deletado com sucesso');
            return redirect(route('admin/clients'));
        } else {
            session()->flash('error', 'Cliente não foi deletado com sucesso');
            return redirect(route('admin/clients'));
        }
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'cpf' => 'required',
            'pet' => 'required',
        ]);

        $clients = Client::findOrFail($id);
        $name = $request->name;
        $email = $request->email;
        $telephone = $request->telephone;
        $cpf = $request->cpf;
        $pet = $request->pet;

        $clients->name = $name;
        $clients->email = $email;
        $clients->telephone = $telephone;
        $clients->cpf = $cpf;
        $clients->pet = $pet;
        $data = $clients->save();
        if ($data) {
            session()->flash('success', 'Produto editado com sucesso!');
            return redirect(route('admin/clients'));
        } else {
            session()->flash('error', 'Algum problema aconteceu!');
            return redirect(route('admin/clients/update'));
        }
    }
}

