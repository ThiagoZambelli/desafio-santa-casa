<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Permissão
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('permissions.update', $permission) }}">
                @csrf
                @method('PUT')

                @include('permissions.form')

                <div class="mt-6 flex items-center gap-3">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-black font-semibold rounded-lg shadow transition duration-200">
                        Atualizar
                    </button>

                    <a href="{{ route('permissions.index') }}"
                       class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-black font-semibold rounded-lg transition duration-200">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>