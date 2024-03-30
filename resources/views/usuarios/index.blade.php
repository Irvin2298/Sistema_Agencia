@extends('layouts.app')
@section('title')
    Usuarios
@endsection
@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Usuarios</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">

                        @can('ver-usuario')
                            <a class="btn btn-warning" href="{{ route('usuarios.create') }}" title="Crear nuevo usuario"> <i class="fa fa-plus" aria-hidden="true"></i> Nuevo usuario</a>
                        @endcan
                      <div>
                      <br>
                      </div>

                            <table class="table table-striped mt-2 table_id" id="miTabla">
                              <thead style="background-color:#6777ef">
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">Correo electronico</th>
                                  <th style="color:#fff;">Rol</th>
                                  <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                                @foreach ($usuarios as $usuario)
                                  <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                      @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolNombre)
                                          <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                        @endforeach
                                      @endif
                                    </td>

                                    <td>
                                      <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}" title="Editar usuario"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                                      @php
                                                $canDelete = Gate::allows('borrar-grupo');
                                            @endphp
                                      @if ($canDelete)
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="fntDeleteCargo('{{ $usuario->id }}', '{{ $usuario->name }}')">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                        </button>

                                                @endif
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->

                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- JQUERY -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
    <script src ="{{ asset('dataTable/jquery-3.4.1.js') }}"> </script>

    <!-- DATATABLES -->
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <script src="{{ asset('dataTable/jquery.dataTables.min.js') }}"></script>

    <!-- BOOTSTRAP -->
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->
    <script src="{{ asset('dataTable/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        new DataTable('#miTabla', {
    lengthMenu: [
        [10, 15, 20],
        [10, 15, 20]
    ],

    columns: [
        { Id: 'Id' },
        { Nombre: 'Nombre' },
        { Email: 'E-mail' },
        { Rol: 'Rol' },
        { Acciones: 'Acciones' }
    ],

    language: {
        url: '/dataTable/es-ES.json',
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
                title: '¿Deseas eliminar el usuario ' + nombre + '?',
                text: "Ya no podrás visualizar este usuario en la tabla.",
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
                    url: "usuarios/eliminar/"+usuarioId,
                });
                window.location="http://127.0.0.1:8000/usuarios";
            }
        })
        }
    </script>
@endsection




