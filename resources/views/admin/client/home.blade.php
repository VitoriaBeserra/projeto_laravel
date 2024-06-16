<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Client')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista de cliente</h1>
                        <a href="{{ route('admin/clients/create') }}" class="btn btn-primary">Adicionar Clientes</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Pet</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $client->name }}</td>
                                <td class="align-middle">{{ $client->email }}</td>
                                <td class="align-middle">{{ $client->telephone }}</td>
                                <td class="align-middle">{{ $client->cpf }}</td>
                                <td class="align-middle">{{ $client->pet }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" aria-label="Basic example">
                                        <a href="{{ route('admin/clients/edit', ['id'=>$client->id]) }}" type="button" class="btn btn-secondary">Editar</a>
                                        <a href="{{ route('admin/clients/delete', ['id'=>$client->id]) }}" type="button" class="btn btn-danger">Deletar</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Nenhum cliente encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
</x-app-layout>
