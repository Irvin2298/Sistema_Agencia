@extends('layouts.app')
@section('title')
    Roles
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('ver-rol')
                                <a class="btn btn-warning" href="{{ route('roles.create') }}" title="Crear nuevo rol"> <i class="fa fa-plus" aria-hidden="true"></i> Nuevo rol</a>
                            @endcan
                        <div>
                            <br>
                        </div>

                            <table class="table table-striped mt-2 table_id" id="miTabla2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td style="display: none;">{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('editar-rol')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" title="Editar role"> <i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                                        @endcan

                                        @can('borrar-rol')
                                            <button type="submit" class="btn btn-danger" onclick="fntDeleteCargo('{{ $role->id }}', '{{ $role->name }}')">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        new DataTable('#miTabla2', {
    lengthMenu: [
        [10, 15, 20],
        [10, 15, 20]
    ],

    columns: [
        { Id: 'Id' },
        { Name: 'Name' },
        // { Guard_name: 'Guard_name'},
        { Acciones: 'Acciones' }
    ],

    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    }
});
    </script>
@endsection

@section('scripts')
    @if(session('success'))
        <script>
            Swal.fire(
                "Felicidades!",
                "{{ Session::get('success') }}",
                "success"
            )
        </script>
    @endif

    <script>
        function fntDeleteCargo(usuarioId, nombre){
            Swal.fire({
                title: '¿Deseas eliminar el rol ' + nombre + '?',
                text: "Ya no podrás visualizar este rol en la tabla.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "roles/eliminar/"+usuarioId,
                });
                window.location="http://127.0.0.1:8000/roles";
            }
        })
        }
    </script>
@endsection




