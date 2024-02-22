@extends('layouts.app')
@section('title')
    Recibos
@endsection
@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Recibos</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                      @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                            </div>

                      <br><br>
                      </div>
                        <div class="table-responsive">
                            <table class="table table-striped mt-2 table_id" id="miTabla2">
                              <thead style="background-color:#6777ef">
                                  <th style="display: none; cursor: pointer;">ID</th>
                                  <th style="color:#fff; cursor: pointer;">Nombre <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Cantidad en letra  <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Cantidad en número <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Fecha del recibo <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Fecha de creación<i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Concepto <i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff; cursor: pointer;">Agente responsable<i class="fas fa-caret-square-o-down" aria-hidden="true"></i></th>
                                  <th style="color:#fff;" class="text-center">Acciones</th>
                              </thead>
                              <tbody>
                                @foreach ($recibos as $recibo)
                                  <tr>
                                    <td style="display: none;">{{ $recibo->id }}</td>
                                    <td>{{ ucwords($recibo->nombre) }} {{ ucwords($recibo->apellido_paterno) }} {{ ucwords($recibo->apellido_materno) }}</td>
                                    <td>{{ $recibo->cantidad_numero }}</td>
                                    <td>{{ ucwords($recibo->cantidad_letra) }}</td>
                                    @php
                                        $fecha = \Carbon\Carbon::createFromFormat('Y-m-d', $recibo->fecha);
                                        $fechaEnPalabras = $fecha->isoFormat('LL');
                                    @endphp
                                    <td>{{ $fechaEnPalabras }}</td>
                                    @php
                                        $fechaCreacion = \Carbon\Carbon::createFromFormat('Y-m-d', $recibo->fecha_creacion);
                                        $fechaCreacionEnPalabras = $fechaCreacion->isoFormat('LL');
                                    @endphp
                                    <td>{{ $fechaCreacionEnPalabras }}</td>
                                    <td>{{ $recibo->concepto }}</td>
                                    <td>{{ ucwords($recibo->nombre_agente) }}</td>
                                    <td>
                                        

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-warning" onclick="fntDeleteRecibo('{{ $recibo->id }}', '{{ $recibo->nombre }}')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Borrar
                                                </button>
                                                <a class="btn btn-danger" href="../documentos/recibo/{{$recibo->id}}"" title="Descargar constancia" target="_blank">
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
        { Nombre: 'Nombre' },
        { Cantidad_en_número: 'Cantidad_en_número' },
        { Cantidad_en_letra: 'Cantidad_en_letra' },
        { Fecha: 'Fecha' },
        { Fecha_creacion: 'Fecha_creacion' },
        { Concepto: 'Concepto' },
        { Nombre_agente: 'Nombre_agente' },
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
        function fntDeleteRecibo(ReciboId, recibo){
            Swal.fire({
                title: '¿Deseas eliminar el recibo de ' + recibo + '?',
                text: "Ya no podrás visualizar este recibo en la tabla.",
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
                    url: "recibos/eliminarId/"+ReciboId,
                });
                window.location="http://127.0.0.1:8000/documentos/recibos_generados";
            }
        })
        }
    </script>
@endsection
