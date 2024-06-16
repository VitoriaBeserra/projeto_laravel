<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Petville Admin') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-danger-900 d-flex justify-content-between align-items-center">
                    <p class="text-dark">Você fez login!</p>
                    <p><a href="/admin/services" class="btn btn-primary">Serviços</a></p>
                    <p><a href="/admin/clients" class="btn btn-primary">Clientes</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>