<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Permissão</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form method="POST" action="{{ route('permissions.update', $permission) }}">
                @csrf
                @method('PUT')

                @include('permissions.form')

                <div class="mt-6 flex gap-3">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md">Atualizar</button>
                    <a href="{{ route('permissions.index') }}" class="px-4 py-2 bg-gray-200 rounded-md">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>