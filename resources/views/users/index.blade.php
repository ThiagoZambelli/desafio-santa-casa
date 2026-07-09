<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuários
            </h2>

            <a href="{{ route('users.create') }}"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-black font-semibold rounded-lg shadow transition duration-200">
                Novo Usuário
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @include('partials.alerts')

        <div class="bg-white shadow rounded-lg overflow-hidden">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Nome
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            E-mail
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Perfil
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Permissões
                        </th>

                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">
                            Ações
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @forelse ($users as $user)

                        <tr>

                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $user->roles->pluck('name')->join(', ') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $user->permissions->pluck('name')->join(', ') ?: '-' }}
                            </td>

                            <td class="px-6 py-4 text-right">

                                <a href="{{ route('users.edit', $user) }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('users.destroy', $user) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="ml-4 text-red-600 hover:text-red-800 font-medium"
                                        onclick="return confirm('Deseja excluir este usuário?')">

                                        Excluir

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="px-6 py-6 text-center text-gray-500">

                                Nenhum usuário encontrado.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="p-4">
                {{ $users->links() }}
            </div>

        </div>

    </div>

</x-app-layout>