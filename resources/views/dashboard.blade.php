<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Painel Administrativo
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-8 mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">
                Bem-vindo, {{ auth()->user()->name }}!
            </h3>

            <p class="text-gray-600">
                Este painel exibe as funcionalidades disponíveis conforme seu perfil e permissões.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            @role('Administrador')
                <div class="bg-white shadow rounded-lg p-6">
                    <p class="text-sm text-gray-500">Usuários cadastrados</p>
                    <p class="text-3xl font-bold text-gray-800">{{ \App\Models\User::count() }}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <p class="text-sm text-gray-500">Permissões cadastradas</p>
                    <p class="text-3xl font-bold text-gray-800">{{ \Spatie\Permission\Models\Permission::count() }}</p>
                </div>
            @endrole

            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-sm text-gray-500">Perfil atual</p>
                <p class="text-xl font-bold text-gray-800">
                    {{ auth()->user()->roles->pluck('name')->join(', ') }}
                </p>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h4 class="text-lg font-semibold text-gray-800 mb-4">
                Acesso rápido
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @role('Administrador')
                    <a href="{{ route('users.index') }}" class="p-4 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Usuários
                    </a>

                    <a href="{{ route('permissions.index') }}" class="p-4 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Permissões
                    </a>
                @endrole

                @can('setores')
                    <a href="{{ route('modules.setores') }}" class="p-4 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Setores Hospitalares
                    </a>
                @endcan

                @can('especialidades')
                    <a href="{{ route('modules.especialidades') }}" class="p-4 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Especialidades Médicas
                    </a>
                @endcan

                @can('equipamentos')
                    <a href="{{ route('modules.equipamentos') }}" class="p-4 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Equipamentos
                    </a>
                @endcan

                @can('unidades')
                    <a href="{{ route('modules.unidades') }}" class="p-4 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Unidades Assistenciais
                    </a>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>