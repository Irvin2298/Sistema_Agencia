@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Inscripciones</h3>
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

                        <a class="btn btn-warning" href="{{ route('inscripcion.create') }}" title="Crear nuevo Cargo"><i class="fa fa-plus" aria-hidden="true"></i> Nueva inscripcion</a>
                        <div>
                            <br>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mt-2 table_id" id="miTabla2">
                              <thead style="background-color:#6777ef">
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre <i class="fas fa-sort-desc fa-2x" aria-hidden="true"></i></th>
                                  <th style="color:#fff;">Apellido Paterno</th>
                                  <th style="color:#fff;">Apellido Materno</th>
                                  <th style="color:#fff;">Cargo inscrito</th>
                                  <th style="color:#fff;">Acción</th>
                              </thead>
                              <tbody>
                                @foreach ($inscripciones as $inscripcion)
                                    <tr>
                                        <td style="display: none;">{{ $inscripcion->idd }}</td>
                                        <td>{{ $inscripcion->ciudadano }}</td>
                                        <td>{{ $inscripcion->ap }}</td>
                                        <td>{{ $inscripcion->am }}</td>
                                        <td>{{ $inscripcion->cargo }}</td>
                                        <td>
                                            <form action="{{ route('inscripcion.destroy', $inscripcion->idd) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @can('editar-ciudadanos')
                                                <a class="btn btn-info" href="{{ route('inscripcion.edit', $inscripcion->idd) }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                                                </a>
                                                @endcan
                                                @can('borrar-ciudadanos')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </button>
                                                @endcan
                                            </form>
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
        { Ciudadano: 'Ciudadano' },
        { Ap: 'Ap' },
        { Am: 'Am' },
        { Cargo: 'Cargo' },
        { Acciones: 'Acciones' }
    ],

    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    }
});
    </script>

@endsection



