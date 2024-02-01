<html>
<head>
<style>
/**
Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
puede ser de altura y anchura completas.
**/
@page {
    margin: 0cm 0cm;
}

body {
    margin-top: 0.5cm; /* Reducir el espaciado superior */
    margin-left: 2.0cm;
    margin-right: 2.0cm;
    margin-bottom: 2cm;
    position: relative; /* Agregar posición relativa para encabezado y pie de página */
}

header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 0cm;
}

footer {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 1cm;
}



/* Resto del estilo... */

</style>
</head>
<body>
    <font size="12" face="arial" style="line-height: 95%">
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->

{{-- <header>

</header> --}}

<footer>
<!-- <img src="footer.png" width="100%" height="100%"/> -->
</footer>

<!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
<main>
    <img src="{{ public_path().'/img/logo3.png' }}" width="110%" height="6%"/>
    {{-- <br> --}}
    <h4 ALIGN=CENTER>CITATORIO.</h4>
    {{-- <br> --}}
    <h4 ALIGN=left>Santo Domingo Tlaltinango, Santiago Suchilquitongo, Etla, Oax. A {{$hoy}}.</h4>
    {{-- <br> --}}
    {{-- <br> --}}
    <h5 ALIGN=left>C._________________________________</h5>
    <h5 ALIGN=left>Presente</h5>
    {{-- <br> --}}
    <p  ALIGN=JUSTIFY>
        El que suscribe C. {{ strtoupper($nombre) }}, Agente municipal Constitucional, legalmente en funciones de la población de santo Domingo Tlaltinango perteneciente al municipio  de Santiago Suchilquitongo, Etla, Oax., por este medio, me permito citarlo. Para el día {{$fecha_c}} a las {{$hora}} hrs. En  el lugar que ocupa la agencia municipal  para tratar asuntos de suma importancia para nuestra comunidad.  No dudando de su puntual asistencia, queda ante usted.
    </p>
    {{-- <br> --}}
    <h5><center>ATENTAMENTE</center></h5>
    <h5><center>AGENTE MUNICIPAL CONSTITUCIONAL</center></h5>
    <p><center>______________________________</center></p>
    <h5><center>C. {{strtoupper($agente)}}</center></h5>

    <img src="data:image/png;base64,{{ public_path(). '/img/logo3.png' }}" width="110%" height="6%"/>
    {{-- <br> --}}
    <h4 ALIGN=CENTER>CITATORIO.</h4>
    {{-- <br> --}}
    <h4 ALIGN=left>Santo Domingo Tlaltinango, Santiago Suchilquitongo, Etla, Oax. A {{$hoy}}.</h4>
    {{-- <br> --}}
    {{-- <br> --}}
    <h5 ALIGN=left>C._________________________________</h5>
    <h5 ALIGN=left>Presente</h5>
    {{-- <br> --}}
    <p  ALIGN=JUSTIFY>
        El que suscribe C. {{ strtoupper($nombre) }}, Agente municipal Constitucional, legalmente en funciones de la población de santo Domingo Tlaltinango perteneciente al municipio  de Santiago Suchilquitongo, Etla, Oax., por este medio, me permito citarlo. Para el día {{$fecha_c}} a las {{$hora}} hrs. En  el lugar que ocupa la agencia municipal  para tratar asuntos de suma importancia para nuestra comunidad.  No dudando de su puntual asistencia, queda ante usted.
    </p>
    {{-- <br> --}}
    <h5><center>ATENTAMENTE</center></h5>
    <h5><center>AGENTE MUNICIPAL CONSTITUCIONAL</center></h5>
    <p><center>______________________________</center></p>
    <h5><center>C. {{strtoupper($agente)}}</center></h5>
</main>
</body>
</html>
