<!-- resources/views/clientes/create.blade.php -->
<x-app-layout>
    <x-slot name="title">Crear Cliente</x-slot>

    <div class="container mt-4">
        <h1>Crear Cliente</h1>

        <form method="POST" action="{{ route('clientes.store') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombre</label>
                <input id="nombres" type="text" name="nombres" class="form-control" value="{{ old('nombres') }}" required>
                @error('nombres')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input id="apellidos" type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
                @error('apellidos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Empresa -->
            <div class="mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input id="empresa" type="text" name="empresa" class="form-control" value="{{ old('empresa') }}">
                @error('empresa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="mail" class="form-label">Email</label>
                <input id="mail" type="email" name="mail" class="form-control" value="{{ old('mail') }}" required>
                @error('mail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input id="telefono" type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                @error('telefono')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="btn btn-primary">Crear Cliente</button>
        </form>
    </div>
</x-app-layout>
