@extends('layouts.app')
@section('title')
    Nombramientos
@endsection
@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Nombramientos</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            </div>

                      <br><br>
                      </div>
                        <div class="table-responsive">
                            <table class="table table-striped mt-2 table_id" id="miTabla2">
                              <thead style="background-color:#6777ef">
                                  <th style="display: none; cursor: pointer;">ID</th>
                                  <th style="color:#fff; cursor: pointer;">Ciudadano <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Cargo  <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <!-- <th style="color:#fff; cursor: pointer;">Fecha Inicio <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Fecha Fin <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th> -->
                                  <th style="color:#fff; cursor: pointer;">Fecha Creacion <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Agente <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff;" class="text-center">Acciones</th>
                              </thead>
                              <tbody>
                                @foreach ($nombramientos as $nombramiento)
                                  <tr>
                                    <td style="display: none;">{{ $nombramiento->id }}</td>
                                    <td>{{ ucwords($nombramiento->nombre) }} {{ ucwords($nombramiento->apellido_paterno) }} {{ ucwords($nombramiento->apellido_materno) }}</td>
                                    <td>{{ ucwords($nombramiento->cargo) }}</td>
                                    <!-- <td>{{ ucwords($nombramiento->fecha_inicio) }}</td>
                                    <td>{{ ucwords($nombramiento->fecha_fin) }}</td> -->
                                    @php
                                        $fechaCreacion = \Carbon\Carbon::createFromFormat('Y-m-d', $nombramiento->fecha_creación);
                                        $fechaCreacionEnPalabras = $fechaCreacion->isoFormat('LL');
                                        @endphp
                                    <td>{{ $fechaCreacionEnPalabras }}</td>
                                    <td>{{ ucwords($nombramiento->nombre_agente) }}</td>
                                    <td>
                                        

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-warning" onclick="fntDeleteNombramiento('{{ $nombramiento->id }}', '{{ $nombramiento->nombre }}')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </button>
                                                <a class="btn btn-danger" href="../documentos/nombramiento/{{$nombramiento->id}}" title="Descargar constancia" target="_blank">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar
                                                </a>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>

                            
                            <!-- Centramos la paginacion a la derecha -->
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12">
                                    <a href="/documentos" style="float: right;" class="btn btn-warning">Regresar</a>
                                </div>
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
        new DataTable('#miTabla2', {
    lengthMenu: [
        [10, 15, 20],
        [10, 15, 20]
    ],

    columns: [
        { Id: 'Id' },
        { Nombre: 'Ciudadano' },
        { Cargo: 'Cargo' },
        // { Fecha_inicio: 'Fecha_inicio' },
        // { Fecha_fin: 'Fecha_fin' },
        { Fecha_creacion: 'Fecha_creación' },
        { Nombre_agente: 'Nombre_agente' },
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
        function fntDeleteNombramiento(NombramientoId, nombramiento){
            Swal.fire({
                title: '¿Deseas eliminar el nombramiento de ' + nombramiento + '?',
                text: "Ya no podrás visualizar este nombramiento en la tabla.",
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
                    url: "nombramientos/eliminarId/"+NombramientoId,
                });
                window.location="http://127.0.0.1:8000/documentos/documentos_generados";
            }
        })
        }
    </script>
@endsection
