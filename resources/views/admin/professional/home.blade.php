<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-branco leading-tight">
            {{ __('Admin Profissional')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista de profissionais</h1>
                        <a href="{{ route('admin/professionals/create') }}" class="btn btn-primary">Adicionar profissionais</a>
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
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($professionals as $professional)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $professional->name }}</td>
                                <td class="align-middle">{{ $professional->email }}</td>
                                <td class="align-middle">{{ $professional->telephone }}</td>
                                <td class="align-middle">{{ $professional->cpf }}</td>
                                <td class="align-middle">
                                    <div class="btn-group d-flex " aria-label="Basic example">
                                        <a href="{{ route('admin/professionals/edit', ['id'=>$professional->id]) }}" type="button" class="btn btn-warning">Editar</a>
                                        <a href="{{ route('admin/professionals/delete', ['id'=>$professional->id]) }}" type="button" class="btn btn-danger">Deletar</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Nenhum Profissional encontrado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
</x-app-layout>
