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
    <h4 ALIGN=RIGHT>SANTO DOMINGO TLALTINANGO, STGO. SUCHILQUITONGO, ETLA, OAX, A {{$fecha_actual}}.</>
    <br>
    <h4 ALIGN=RIGHT>NOMBRAMIENTO</>
    <br>
    <h4 ALIGN=LEFT>C. {{strtoupper($nombre)}} {{strtoupper($apellido_p)}} {{strtoupper($apellido_m)}}</>
    <br>
    <p  ALIGN=JUSTIFY>El que suscribe C. {{$agente}}, Agente Municipal, legalmente en funciones de la población de Santo Domingo Tlaltinango, 
        Municipio de Santiago Suchilquitongo, Etla, Oax., y con las facultades que nuestras leyes me confieren, me permito extender el siguiente nombramiento
         de: 
    </p>
    <br>
    <h4><center>{{$cargo}}</center></>
    <br>
    <p  ALIGN=JUSTIFY>Cargo que fue conferido en asamblea general de población, y  dicho cargo se desempeñó dentro del periodo del {{$fecha_ini}} al
         {{$fecha_fin}}, que fué conferido por ser una persona con un gran sentido de responsabilidad, en beneficio de nuestra comunidad.
    </p>
    <br>
    <h4><center>ATENTAMENTE</center></>
    <h4><center>AGENTE MUNICIAPL</center></>
    <br>
    <p><center>________________________</center></p>
    <!-- <br> -->
    <h4><center>C. {{strtoupper($agente)}}</center></h5>
</body>
</html>