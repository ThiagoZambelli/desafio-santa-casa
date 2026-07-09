<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nome</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Senha</label>
        <input type="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
        <input type="password" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Perfil</label>
        <select name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}"
                    @selected(old('role', isset($user) ? $user->roles->first()?->name : '') === $role->name)>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        @error('role') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Permissões</label>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            @foreach ($permissions as $permission)
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                        @checked(in_array($permission->name, old('permissions', $userPermissions ?? [])))>
                    <span>{{ ucfirst($permission->name) }}</span>
                </label>
            @endforeach
        </div>

        @error('permissions') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>