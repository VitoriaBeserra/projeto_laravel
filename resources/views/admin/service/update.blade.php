<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-branco leading-tight">
            {{ __('Editar serviços') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Editar dados do Serviço</h1>
                    </div>
                    <hr />
                    <p><a href="{{ route('/admin/services') }}" class="btn btn-primary">Voltar</a></p>
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <form action="{{ route('admin/services/update', $services->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nome">Nome:</label>
                                <input type="text" name="name" class="form-control" placeholder="" value="{{$services->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="professional">Profissional:</label>
                                <input type="text" name="professional" class="form-control" placeholder="" value="{{$services->professional}}">
                                @error('professional')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="price">Preço:</label>
                                <input type="text" name="price" class="form-control" placeholder="" value="{{$services->price}}" onInput="mascaraMoeda(event);">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
 <!-- tentar estilizar esse botão de voltar-->
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
    const mascaraMoeda = (event) => {
    const onlyDigits = event.target.value
        .split("")
        .filter(s => /\d/.test(s))
        .join("")
        .padStart(3, "0")
    const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2)
    event.target.value = maskCurrency(digitsFloat)
    }

    const maskCurrency = (valor, locale = 'pt-BR', currency = 'BRL') => {
    return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency
    }).format(valor)
    }
</script>