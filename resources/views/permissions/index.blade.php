<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permissões
            </h2>

            <a href="{{ route('permissions.create') }}"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-black font-semibold rounded-lg shadow transition duration-200">
                Nova Permissão
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('partials.alerts')

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nome</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">Ações</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($permissions as $permission)
                        <tr>
                            <td class="px-6 py-4">{{ $permission->name }}</td>

                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('permissions.edit', $permission) }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('permissions.destroy', $permission) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="ml-4 text-red-600 hover:text-red-800 font-medium"
                                        onclick="return confirm('Deseja excluir esta permissão?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-6 text-center text-gray-500">
                                Nenhuma permissão encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-4">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>