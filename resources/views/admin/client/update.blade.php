<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-branco leading-tight">
            {{ __('Editar Cliente')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Editar clientes</h1>
                    <hr />
                    <form action="{{ route('admin/clients/update', $clients->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nome do responsável</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$clients->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{$clients->email}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="text" name="telephone" class="form-control" placeholder="Telefone" value="{{$clients->telephone}}" id="CelularInput" maxlength="11" oninput="criaMascara('Celular')">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{$clients->cpf}}" id="CPFInput" maxlength="11" oninput="criaMascara('CPF')">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nome do pet</label>
                                <input type="text" name="pet" class="form-control" placeholder="Pet" value="{{$clients->pet}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
  function criaMascara(mascaraInput) {
    const maximoInput = document.getElementById(`${mascaraInput}Input`).maxLength;
    let valorInput = document.getElementById(`${mascaraInput}Input`).value;
    let valorSemPonto = document.getElementById(`${mascaraInput}Input`).value.replace(/([^0-9])+/g, "");
    const mascaras = {
      CPF: valorInput.replace(/[^\d]/g, "").replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4"),
      Celular: valorInput.replace(/[^\d]/g, "").replace(/^(\d{2})(\d{5})(\d{4})/, "($1) $2-$3"),
    };

    valorInput.length === maximoInput ? document.getElementById(`${mascaraInput}Input`).value = mascaras[mascaraInput] : document.getElementById(`${mascaraInput}Input`).value = valorSemPonto;
  };
</script>