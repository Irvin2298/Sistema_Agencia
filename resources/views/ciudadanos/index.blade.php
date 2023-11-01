@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Ciudadanos</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                      <a class="btn btn-warning" href="{{ route('ciudadanos.create') }}" title="Crear nuevo ciudadano"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Ciudadano</a>
                      <div>
                      <br>
                      </div>
                        <div class="table-responsive">
                            <table class="table table-striped mt-2 table_id" id="miTabla2">
                              <thead style="background-color:#6777ef">
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">Apellido paterno</th>
                                  <th style="color:#fff;">Apellido Materno</th>
                                  <th style="color:#fff;">Estado</th>
                                  <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                                @foreach ($ciudadanos as $ciudadano)
                                  <tr>
                                    <td style="display: none;">{{ $ciudadano->id }}</td>
                                    <td>{{ $ciudadano->nombre }}</td>
                                    <td>{{ $ciudadano->apellido_p }}</td>
                                    <td>{{ $ciudadano->apellido_m }}</td>
                                    <td>
                                        @if ($ciudadano->estado==1)
                                            {{'Activo'}}
                                        @endif
                                        @if($ciudadano->estado==0)
                                            {{'Inhactivo'}}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('ciudadanos.destroy',$ciudadano->id) }}" method="POST">
                                            @can('editar-ciudadanos')
                                            <a class="btn btn-info" href="{{ route('ciudadanos.edit',$ciudadano->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                                            @endcan
                                            {{-- <a class="btn btn-info" href="{{ route('ciudadanos.show',$ciudadano->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> modal</a> --}}
                                            {{-- <a class="btn btn-info" href="{{ route('ciudadanos.details', $ciudadano->id) }}" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> Ver Detalles
                                            </a> --}}

                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-ciudadanos')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan

                                        </form>
                                        {{-- <i class="fa-solid fa-pen-to-square"></i> --}}
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
        [3, 5, 15],
        [3, 5, 15]
    ],

    columns: [
        { Id: 'Id' },
        { Nombre: 'Nombre' },
        { Apellido_p: 'Apellido_p' },
        { Apellido_m: 'Apellido_m' },
        { Estado: 'Estado' },
        { Acciones: 'Acciones' }
    ],

    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    }
});
    </script>

@endsection



