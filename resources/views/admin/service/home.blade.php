<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin serviços') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista de serviços</h1>
                        <a href="{{ route('admin/services/create') }}" class="btn btn-primary">Adicionar serviços</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead class="table-secondary">
                            <tr>
                                <td>N°</td>
                                <td>Nome</td>
                                <td>Profissional</td>
                                <td>Preço</td>
                                <td>Ação</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $service->name }}</td>
                                <td class="align-middle">{{ $service->professional }}</td>
                                <td class="align-middle">{{ $service->price }}</td>
                                <td class="align-middle">
                                    <div class="btn-group d-flex " role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/services/edit', ['id'=>$service->id]) }}" type="button" class="btn btn-warning">Editar</a>
                                        <a href="{{ route('admin/services/delete', ['id'=>$service->id]) }}" type="button" class="btn btn-danger">Deletar</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Sem serviços cadastrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>