@extends('layouts.appDocumentos')
@section('title')
    Documentos
@endsection
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
                                        <select required name="documento" style="height: 40px;" class="form-control selectpicker" data-live-search="true" id="documentos">
                                            <option disabled selected value="">Documentos</option>
                                            <option value="Recibo">Recibo</option>
                                            <option value="Nombramiento">Nombramiento</option>
                                            <option value="Citatorio">Citatorio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"  id="contenidoHistorial" style="display: none;">
                                    <div class="container form-group">
                                    <label for="sexo">Puedes visualizar archivos anteriores: </label>
                                        <br>                                    
                                    <center><a href="{{ route('documentosGenerados.index') }}" class="btn btn-success custom-btn" style="height: 35px; float: rigth;">Ver historial</a></center>
                                    </div>
                                </div>
                                <div class="form-group"  id="contenidoHistorialRecibo" style="display: none;">
                                    <div class="container form-group">
                                    <label for="sexo">Puedes visualizar archivos anteriores: </label>
                                        <br>                                    
                                    <center><a href="{{ route('recibos_generados.index') }}" class="btn btn-success custom-btn" style="height: 35px; float: rigth;">Ver historial</a></center>
                                    </div>
                                </div>
                            </div>


                        <div id="contenidoRecibo" class="opcionesDiv" style="display: none;">
                            <form action="{{ route('documentos.crearRecibo') }}" id="formularioRecibo" method="post" onsubmit="return crearRecibo()" target="_blank">
                                @csrf
                                <!-- Datos para generar el recibo -->

                                <label class="text-danger">Los campos con * son obligatorios</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre: </label><span class="required text-danger">*</span>
                                            <input type="text" id="nombre_recibo" name="nombre" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+" title="Solo se permiten letras y espacios" class="form-control" placeholder="Nombre/s" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="apellido_p">Apellido paterno: </label><span class="required text-danger">*</span>
                                            <input type="text" id="apellido_m_recibo" name="apellido_p" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Paterno" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="apellido_m">Apellido Materno: </label><span class="required text-danger">*</span>
                                            <input type="text" id="apellido_p_recibo" name="apellido_m" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Materno" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cantidad_numero">Cantidad: </label><span class="required text-danger">*</span>
                                            <input type="number" id="cantidad_numero_recibo" name="cantidad_numero"  title="Solo se permiten números" class="form-control" placeholder="Cantidad del recibo en número" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cantidad_letra">Cantidad: </label><span class="required text-danger">*</span>
                                            <input type="text" id="cantidad_letra_recibo" name="cantidad_letra" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Cantidad del recibo en letra" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group nf-date">
                                            <label for="fecha_recibo">Fecha: <span class="required text-danger">*</span></label>
                                            <input required type="date" id="fechaRecibo" name="fecha_recibo" min="{{ now()->format('Y') }}-01-01" max="{{ now()->format('Y-m-d') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="concepto_recibo">Concepto: <span class="required text-danger">*</span></label>
                                            <textarea class="form-control" id="concepto_recibo" name="concepto_recibo" style="height: 100px;" placeholder="Escribe el concepto del recibo"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" style="float: right;"  onclick="crearRecibo()"  target="_blank">Generar y Guardar Recibo</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                            <!-- Terminan los datos para generar el recibo -->


                            <div id="contenidoNombramiento" class="opcionesDiv" style="display: none;">
                                <form action="{{ route('documentos.crearNombramiento') }}" id="formularioNombramiento"  target="_blank" onsubmit="return crearNombramiento()" method="post">
                                    @csrf
                                    <!-- Datos para generar el nombramiento -->

                                    <label class="text-danger">Los campos con * son obligatorios</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre">Nombre/s: </label><span class="required text-danger">*</span>
                                                <input type="text" id="nombre_nombramiento" name="nombre" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+" title="Solo se permiten letras y espacios" class="form-control" placeholder="Nombre/s" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_p">Apellido paterno: </label><span class="required text-danger">*</span>
                                                <input type="text" id="apellido_p_nombramiento" name="apellido_p" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Paterno" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_m">Apellido Materno: </label><span class="required text-danger">*</span>
                                                <input type="text" id="apellido_m_nombramiento" name="apellido_m" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Apellido Materno" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cargo">Cargo: </label><span class="required text-danger">*</span>
                                                <input type="text" id="cargo_nombramiento" name="cargo" pattern="[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+"  title="Solo se permiten letras" class="form-control" placeholder="Cargo" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group nf-date">
                                                <label for="fecha_inicio">Fecha de inicio: <span class="required text-danger">*</span></label>
                                                <input required type="date" id="fecha_inicio_nombramiento" name="fecha_inicio" max="{{ \Carbon\Carbon::today()->subMonth()->format('Y-m-d') }}" onchange="establecerFechaMinima()" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group nf-date">
                                                <label for="fecha_final">Fecha de término: <span class="required text-danger">*</span></label>
                                                <input required type="date" id="fecha_final_nombramiento" name="fecha_final" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="float: right;" onclick="crearNombramiento()">Generar y Guardar Nombramiento</button>
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
                                            <label for="nombre">Nombre: </label><span class="required text-danger">*</span>
                                            <input type="text" name="nombre" title="Solo se permiten letras y espacios" class="form-control" placeholder="Nombre completo del remitente" required>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            @php
                                                $Date = date("Y-m-d");
                                                $nuevafecha = strtotime ('+2 month' , strtotime($Date)); //Se le suman 2 meses
                                                $nuevafecha = date ('Y-m-d',$nuevafecha);
                                            @endphp
                                                <label for="fecha_citatorio">Fecha del citatorio: <span class="required text-danger">*</span></label>
                                                <input required type="date" id="fechaCitatorio" name="fecha_citatorio" min="{{ now()->format('Y-m-d') }}" max="{{$nuevafecha}}";   class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="hora">Hora: <span class="required text-danger">*</span></label>
                                                <input required type="time" id="horaRecibo" min="07:00" max="22:00" name="hora" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="float: right;"target="_blank">Generar Citatorios</button>
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

<script>
    // Obtén referencias a los elementos select y div
    var selectOpcion = document.getElementById('documentos');
    var divContenido = document.getElementById('contenidoHistorial');

    // Agrega un evento de cambio al select
    selectOpcion.addEventListener('change', function() {
      // Obtiene el valor seleccionado en el select
      var opcionSeleccionada = selectOpcion.value;

      // Actualiza el contenido del div según la opción seleccionada
      switch (opcionSeleccionada) {
        case 'Nombramiento':
            $('#contenidoHistorialRecibo').hide();
            $('#contenidoHistorial').show();
          break;
        case 'Recibo':
            $('#contenidoHistorial').hide();
            $('#contenidoHistorialRecibo').show();
          break;
        default:
          // Manejo de valores no esperados (opcional)
          $('#contenidoHistorial').hide();
          $('#contenidoHistorialRecibo').hide();
      }
    });
</script>

<script>
    var fechasInhabiles = @json($fechasInhabiles); // Convierte el array de fechas a formato JSON

    document.getElementById('fechaCitatorio').addEventListener('input', function() {
        var fechaSeleccionada = this.value;

        // Verificar si la fecha seleccionada está en la lista de fechas inhabilitadas
        if (fechasInhabiles.includes(fechaSeleccionada)) {
            Swal.fire({
                icon: 'warning',
                html: `<h3>Esta fecha no está permitida. Por favor, elige otra.</h3>
                    <p>Has elegido un día inhábil!!!</p>
                    `,
            });
            this.value = ''; // Limpiar el campo si se selecciona una fecha inhabilitada
        }
    });
</script>

<script>
    document.getElementById('horaRecibo').addEventListener('input', function() {
        var selectedTime = this.value;
        var minTime = this.getAttribute('min');
        var maxTime = this.getAttribute('max');

        if (selectedTime < minTime || selectedTime > maxTime) {
            Swal.fire({
                icon: 'error',
                title: 'Hora no permitida',
                text: 'Selecciona una hora dentro del rango permitido (7:00 A.M. y 10:00 P.M.).',
            });
            this.value = ''; // Limpiar el campo si se selecciona una hora fuera de los límites
        }
    });
</script>

<script>
    function crearNombramiento() {
        // Obtén los valores del formulario
        event.preventDefault();

        var nombre = document.getElementById("nombre_nombramiento").value;
        var ap_m = document.getElementById("apellido_m_nombramiento").value;
        var ap_p = document.getElementById("apellido_p_nombramiento").value;
        var cargo = document.getElementById("cargo_nombramiento").value;
        var fi = document.getElementById("fecha_inicio_nombramiento").value;
        var ff = document.getElementById("fecha_final_nombramiento").value;

        if (nombre.trim() === '' || ap_m.trim() === '' || ap_p.trim() === '' || cargo.trim() === '' || fi.trim() === '' || ff.trim() === '') {
            // Si no están completos, muestra un mensaje y evita el envío del formulario
            Swal.fire({
                title: 'Campos incompletos',
                text: 'Por favor, completa todos los campos requeridos.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
            return false;
        }

        var nombre = document.getElementById("nombre_nombramiento").value;

        // Construye el mensaje para la alerta de SweetAlert
        var mensaje = `¿Deseas crear y guardar el nombramiento de ${nombre}?`;

        // Muestra la alerta de SweetAlert con los datos del formulario
        Swal.fire({
            title: 'Creación del nombramiento',
            text: mensaje,
            icon: 'info',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            // Si el usuario hace clic en "Sí, enviar", procede a enviar el formulario
            if (result.isConfirmed) {
                enviarFormulario();
            }
        });
    }

    function enviarFormulario() {
        // Aquí puedes agregar lógica para enviar el formulario
        // Puedes utilizar AJAX, el atributo "action" del formulario, etc.
        
        // En este ejemplo, simplemente mostramos una alerta indicando que el formulario se envió
        Swal.fire({
            title: '¡Datos guardados!',
            text: 'Se ha guardado y generado el nombramiento.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });

        // Puedes añadir aquí la lógica real para enviar el formulario si es necesario
        document.getElementById('formularioNombramiento').submit();
        var inputElement = document.getElementById("nombre_nombramiento");
        inputElement.value = "";
        var inputElement2 = document.getElementById("apellido_m_nombramiento");
        inputElement2.value = "";
        var inputElement3 = document.getElementById("apellido_p_nombramiento");
        inputElement3.value = "";
        var inputElement4 = document.getElementById("cargo_nombramiento");
        inputElement4.value = "";
        var inputElement5 = document.getElementById("fecha_inicio_nombramiento");
        inputElement5.value = "";
        var inputElement6 = document.getElementById("fecha_final_nombramiento");
        inputElement6.value = "";
    }
</script>

<script>
    function crearRecibo() {
        // Obtén los valores del formulario
        event.preventDefault();

        var nombre = document.getElementById("nombre_recibo").value;
        var ap_m = document.getElementById("apellido_m_recibo").value;
        var ap_p = document.getElementById("apellido_p_recibo").value;
        var cant_numero = document.getElementById("cantidad_numero_recibo").value;
        var cant_letra = document.getElementById("cantidad_letra_recibo").value;
        var fecha = document.getElementById("fechaRecibo").value;
        var concepto = document.getElementById("concepto_recibo").value;

        if (nombre.trim() === '' || ap_m.trim() === '' || ap_p.trim() === '' || cant_numero.trim() === '' || cant_letra.trim() === '' || fecha.trim() === '' || concepto.trim() === '') {
            // Si no están completos, muestra un mensaje y evita el envío del formulario
            Swal.fire({
                title: 'Campos incompletos',
                text: 'Por favor, completa todos los campos requeridos.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
            return false;
        }

        var nombre = document.getElementById("nombre_recibo").value;

        // Construye el mensaje para la alerta de SweetAlert
        var mensaje = `¿Deseas crear y guardar el recibo de ${nombre}?`;

        // Muestra la alerta de SweetAlert con los datos del formulario
        Swal.fire({
            title: 'Creación del recibo',
            text: mensaje,
            icon: 'info',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: "Cancelar"
        }).then((result) => {
            // Si el usuario hace clic en "Sí, enviar", procede a enviar el formulario
            if (result.isConfirmed) {
                enviarFormularioRecibo();
            }
        });
    }

    function enviarFormularioRecibo() {
        // Aquí puedes agregar lógica para enviar el formulario
        // Puedes utilizar AJAX, el atributo "action" del formulario, etc.
        
        // En este ejemplo, simplemente mostramos una alerta indicando que el formulario se envió
        Swal.fire({
            title: '¡Datos guardados!',
            text: 'Se ha guardado y generado el recibo.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
        // Puedes añadir aquí la lógica real para enviar el formulario si es necesario
        document.getElementById('formularioRecibo').submit();
        var inputElement = document.getElementById("nombre_recibo");
        inputElement.value = "";
        var inputElement2 = document.getElementById("apellido_m_recibo");
        inputElement2.value = "";
        var inputElement3 = document.getElementById("apellido_p_recibo");
        inputElement3.value = "";
        var inputElement4 = document.getElementById("cantidad_numero_recibo");
        inputElement4.value = "";
        var inputElement5 = document.getElementById("cantidad_letra_recibo");
        inputElement5.value = "";
        var inputElement6 = document.getElementById("fechaRecibo");
        inputElement6.value = "";
        var inputElement6 = document.getElementById("concepto_recibo");
        inputElement6.value = "";
    }
</script>

<script>
    function establecerFechaMinima() {
        var fechaInicio = new Date(document.getElementById("fecha_inicio_nombramiento").value);
        // Agregar 7 días a la fecha de inicio
        fechaInicio.setMonth(fechaInicio.getMonth() + 1);

        // Formatear la nueva fecha como yyyy-mm-dd (formato aceptado por input type="date")
        var nuevaFechaMinima = fechaInicio.toISOString().slice(0, 10);
        document.getElementById("fecha_final_nombramiento").setAttribute("min", nuevaFechaMinima);
    }
</script>

@endsection



