<!DOCTYPE html>
<html>
<head>
    <title>Ponentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Listado de Ponentes</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Biografía</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ponentes as $p)
             <tr>
    <td>{{ $p->nombre }}</td>
    <td>{{ $p->especialidad }}</td>
    <td>{{ $p->biografia }}</td>
    <td>
        <form action="{{ route('ponentes.destroy', $p->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este ponente?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Eliminar</button>
        </form>
    </td>
</tr>
            @endforeach
        </tbody>
    </table>

    <hr class="my-4">

   <!-- Formulario para crear nuevo ponente -->
<form action="{{ url('/ponentes-vista') }}" method="POST" class="mb-4">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="especialidad" class="form-control" placeholder="Especialidad">
        </div>
        <div class="col-md-4">
            <input type="text" name="biografia" class="form-control" placeholder="Biografía">
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-2">Agregar Ponente</button>
</form>

</div>
</body>
</html>
