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

/** Defina ahora los márgenes reales de cada página en el PDF **/
body {
margin-top: 3cm;
margin-left: 2.5cm;
margin-right: 2.5cm;
margin-bottom: 2cm;
}

/** Definir las reglas del encabezado **/
header {
position: fixed;
top: 0cm;
left: 0cm;
right: 0cm;
height: 3cm;
}

/** Definir las reglas del pie de página **/
footer {
position: fixed;
bottom: 0cm;
left: 0cm;
right: 0cm;
height: 2cm;
}
</style>
</head>
<body>
    <font size="13" face="arial" style="line-height: 150%">
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->

<header>
    <!-- <img src="{{public_path().'/img/logo3.png'}}" width="100%" height="100%"/> -->
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path().'/img/logo3.png')) }}" width="100%" height="100%"/>
</header>

<footer>
<!-- <img src="footer.png" width="100%" height="100%"/> -->
</footer>

<!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
<main>
    <br>
    <h4 ALIGN=RIGHT>SANTO DOMINGO TLALTINANGO, STGO. SUCHILQUITONGO, ETLA, OAX, ALGO.</>
    <br>

    <br>
    <h4><center>CONSTANCIA</center></>
    <br>
    @if ($sexo == 'Femenino')
        <p  ALIGN=JUSTIFY>
            EL QUE SUSCRIBE AGENTE MUNICIPAL DE SANTO DOMINGO TLALTINANGO, STGO. SUCHILQUITONGO, ETLA, POR ESTE MEDIO HAGO CONSTAR QUE LA CIUDADANA {{strtoupper($ciudadano)}} {{strtoupper($apellido_p)}} {{strtoupper($apellido_m)}} HA CONCLUIDO EXITOSAMENTE EL CARGO DE {{strtoupper($cargo)}} DURANTE EL PERIODO COMPRENDIDO DEL {{strtoupper($fecha_ini)}} AL {{strtoupper($fecha_fin)}}.
        </p>
    @else
        <p  ALIGN=JUSTIFY>
            EL QUE SUSCRIBE AGENTE MUNICIPAL DE SANTO DOMINGO TLALTINANGO, STGO. SUCHILQUITONGO, ETLA, POR ESTE MEDIO HAGO CONSTAR QUE EL CIUDADANO {{strtoupper($ciudadano)}} {{strtoupper($apellido_p)}} {{strtoupper($apellido_m)}} HA CONCLUIDO EXITOSAMENTE EL CARGO DE {{strtoupper($cargo)}} DURANTE EL PERIODO COMPRENDIDO DEL {{strtoupper($fecha_ini)}} AL {{strtoupper($fecha_fin)}}.
        </p>
    @endif
    <br>
    <p ALIGN=JUSTIFY> POR LO TANTO DOY COMO LIBERADO A DICHO CIUDADANO DE SU CARGO.....</p>
    <br>
    <br>
    <h5><center>ATENTAMENTE</center></h5>
    <h5><center>AGENTE MUNICIPAL CONSTITUCIONAL</center></h5>
    <p><center>______________________________</center></p>
    <h5><center>C. {{strtoupper($agente)}}</center></h5>


</main>
</body>
</html>
