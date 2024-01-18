@extends('layouts.app')

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
                                        <select required name="documento" class="form-control" id="documentos" onchange="cargarContenido()">
                                            <option disabled selected value="">Documentos</option>
                                            <option value="Recibo">Recibo</option>
                                            <!-- <option value="Femenino">Femenino</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div id="contenidoRecibo"> 
                        <form action="{{ route('documentos.crearRecibo') }}" method="post">
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
                                        <input required type="date" name="fecha_recibo" class="form-control">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function cargarContenido() {
            var seleccion = document.getElementById("documentos").value;
            var contenidoDiv = document.getElementById("contenidoDiv");
            var contenidoRecibo = document.getElementById("contenidoRecibo");
            

            // Lógica para cargar el contenido en el div según la opción seleccionada
            switch (seleccion) {
                case "Recibo":
                    contenidoRecibo.style.display = "block";
                    break;
                case "opcion2":
                    contenidoDiv.innerHTML = "<p>Contenido para la Opción 2</p>";
                    break;
                case "opcion3":
                    contenidoDiv.innerHTML = "<p>Contenido para la Opción 3</p>";
                    break;
                default:
                    contenidoDiv.innerHTML = ""; // Limpiar el contenido si no hay coincidencia
            }
        }
    </script>
@endsection
