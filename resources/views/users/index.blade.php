<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Usuários</h2>

            <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                Novo Usuário
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('partials.alerts')

        <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left">Nome</th>
                        <th class="px-4 py-3 text-left">E-mail</th>
                        <th class="px-4 py-3 text-left">Perfil</th>
                        <th class="px-4 py-3 text-left">Permissões</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">{{ $user->roles->pluck('name')->join(', ') }}</td>
                            <td class="px-4 py-3">{{ $user->permissions->pluck('name')->join(', ') ?: '-' }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-600">Editar</a>

                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 ml-3" onclick="return confirm('Deseja excluir este usuário?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>