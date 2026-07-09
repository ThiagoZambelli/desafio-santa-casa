<div>
    <label class="block text-sm font-medium text-gray-700">Nome da permissão</label>

    <input
        type="text"
        name="name"
        value="{{ old('name', $permission->name ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
        placeholder="Ex: equipamentos"
    >

    @error('name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>