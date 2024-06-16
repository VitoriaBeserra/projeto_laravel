<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Service;
 
class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        $total = Service::count();
        return view('admin.service.home', compact(['services', 'total']));
    }
 
    public function create()
    {
        return view('admin.service.create');
    }
 
    public function save(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'professional' => 'required',
            'price' => 'required',
        ]);
        $data = Service::create($validation);
        if ($data) {
            session()->flash('success', 'Serviço foi adicionado com sucesso');
            return redirect(route('/admin/services'));
        } else {
            session()->flash('error', 'Algum erro aconteceu');
            return redirect(route('/admin/services/create'));
        }
    }
    public function edit($id)
    {
        $services = Service::findOrFail($id);
        return view('admin.service.update', compact(['services']));
    }
 
    public function delete($id)
    {
        $services = Service::findOrFail($id)->delete();
        if ($services) {
            session()->flash('success', 'Serviço foi deletado com sucesso');
            return redirect(route('/admin/services'));
        } else {
            session()->flash('error', 'Não foi deletado com sucesso');
            return redirect(route('/admin/service'));
        }
    }
 
    public function update(Request $request, $id)
    {
        $services = Service::findOrFail($id);
        $name = $request->name;
        $professional = $request->professional;
        $price = $request->price;
 
        $services->name = $name;
        $services->professional = $professional;
        $services->price = $price;
        $data = $services->save();
        
        if ($data) {
            session()->flash('success', 'O serviço foi atualizado com sucesso');
            return redirect(route('/admin/services'));
        } else {
            session()->flash('error', 'Não foi editado com sucesso');
            return redirect(route('admin.service.update'));
        }
    }
}