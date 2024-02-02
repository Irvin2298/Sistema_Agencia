@extends('layouts.appDocumentos')

@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Generar documento</h3>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sexo">Selecciona el documento a generar: </label>
                                        <select required name="documento" class="form-control selectpicker" data-live-search="true" id="documentos">
                                            <option disabled selected value="">Documentos</option>
                                            <option value="Recibo">Recibo</option>
                                            <option value="Nombramiento">Nombramiento</option>
                                            <option value="Citatorio">Citatorio</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        <div id="contenidoRecibo" class="opcionesDiv" style="display: none;">
                            <form action="{{ route('documentos.crearRecibo') }}" method="post"  target="_blank">
                                @csrf
                                <!-- Datos para generar el recibo -->

                                <label class="text-danger">Los campos con * son obligatorios</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre: </label><span class="required text-danger">*</span>
                                            <input type="text" name="nombre" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+" title="Solo se permiten letras y espacios" class="form-control" placeholder="Nombre/s" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="apellido_p">Apellido paterno: </label><span class="required text-danger">*</span>
                                            <input type="text" name="apellido_p" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Paterno" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="apellido_m">Apellido Materno: </label><span class="required text-danger">*</span>
                                            <input type="text" name="apellido_m" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Materno" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cantidad_numero">Cantidad: </label><span class="required text-danger">*</span>
                                            <input type="number" name="cantidad_numero"  title="Solo se permiten números" class="form-control" placeholder="Cantidad del recibo en número" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cantidad_letra">Cantidad: </label><span class="required text-danger">*</span>
                                            <input type="text" name="cantidad_letra" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Cantidad del recibo en letra" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group nf-date">
                                            <label for="fecha_recibo">Fecha: <span class="required text-danger">*</span></label>
                                            <input required type="date" name="fecha_recibo" max="{{ now()->format('Y-m-d') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="concepto_recibo">Concepto: <span class="required text-danger">*</span></label>
                                            <textarea class="form-control" id="concepto_recibo" name="concepto_recibo" style="height: 100px;" placeholder="Escribe el concepto del recibo"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" style="float: right;" target="_blank">Generar Recibo</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                            <!-- Terminan los datos para generar el recibo -->


                            <div id="contenidoNombramiento" class="opcionesDiv" style="display: none;">
                                <form action="{{ route('documentos.crearNombramiento') }}" method="post"  target="_blank">
                                    @csrf
                                    <!-- Datos para generar el nombramiento -->

                                    <label class="text-danger">Los campos con * son obligatorios</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre">Nombre/s: </label><span class="required text-danger">*</span>
                                                <input type="text" name="nombre" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+" title="Solo se permiten letras y espacios" class="form-control" placeholder="Nombre/s" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_p">Apellido paterno: </label><span class="required text-danger">*</span>
                                                <input type="text" name="apellido_p" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Paterno" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_m">Apellido Materno: </label><span class="required text-danger">*</span>
                                                <input type="text" name="apellido_m" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Materno" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cargo">Cargo: </label><span class="required text-danger">*</span>
                                                <input type="text" name="cargo" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Materno" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group nf-date">
                                                <label for="fecha_inicio">Fecha de inicio: <span class="required text-danger">*</span></label>
                                                <input required type="date" name="fecha_inicio" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group nf-date">
                                                <label for="fecha_final">Fecha de término: <span class="required text-danger">*</span></label>
                                                <input required type="date" name="fecha_final" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="float: right;" target="_blank">Generar Nombramiento</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div id="contenidoCitatorio" class="opcionesDiv" style="display: none;">
                                <form action="{{ route('documentos.crearCitatorio') }}" method="post"  target="_blank">
                                    @csrf
                                    <!-- Datos para generar el citatorio -->
                                    <label class="text-danger">Los campos con * son obligatorios</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_citatorio">Fecha del citatorio: <span class="required text-danger">*</span></label>
                                                <input required type="date" name="fecha_citatorio" min="{{ now()->format('Y-m-d') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="hora">Hora: <span class="required text-danger">*</span></label>
                                                <input type="time" id="hora" name="hora" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="float: right;" target="_blank">Generar Citatorios</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- Terminan los datos para generar el recibo -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    });
</script>

<script>
    $(document).ready(function () {
        // Manejar el evento de cambio en el select
        $('#documentos').change(function () {
            // Ocultar todos los divs
            $('.opcionesDiv').hide();

            // Mostrar el div correspondiente a la opción seleccionada
            var opcionSeleccionada = $(this).val();
            $('#contenido' + opcionSeleccionada).show();
        });
    });
</script>
@endsection



