<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-branco leading-tight ">
            {{ __('Petville Admin') }}
        </h2>
    </x-slot>
    
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-branco-900 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-danger-900 d-flex justify-content-between align-items-center">
                    

                    <div class="max-w-sm p-6 bg-branco-900 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700 mb-0 text-branco">
                        <img src="{!! asset('img/documento.png')!!}" class="w-12 mb-3" />
                        <h4>Deseja cadastrar algum serviço?</h4>
                        <a href="/admin/services" class="btn btn-info">Cadastrar serviços</a>
                    </div>
                    <div class="max-w-sm p-6 bg-branco-900 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700 mb-0 text-branco">
                        <img src="{!! asset('img/funcionarios.png')!!}" class="w-12 mb-3" />
                        <h4>Deseja cadastrar algum profissional?</h4>
                        <a href="/admin/professionals" class="btn btn-info">Adicionar profissionais</a>
                    </div>
                    <div class="max-w-sm p-6 bg-branco-900 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700 mb-0 text-branco">
                        <img src="{!! asset('img/cliente.png')!!}" class="w-12 mb-3" />
                        <h4>Deseja cadastrar algum cliente?</h4>
                        <a href="/admin/clients" class="btn btn-info">Adicionar clientes</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>