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
    <h4 ALIGN=RIGHT>SANTO DOMINGO TLALTINANGO, STGO. SUCHILQUITONGO, ETLA, OAX, A {{ "fecha" }}.</>
    <br>
    <br>
    <h4 ALIGN=RIGHT>BUENO POR $cantidad.00</>
    <br>
    <br>
    <h4><center>RECIBO</center></>
    <br>
    <p  ALIGN=JUSTIFY>Recibí de la Agencia Municipal de Santo Domingo Tlaltinango, Santiago Suchilquitongo, Etla, Oaxaca, la cantidad de $cantidad.00 (cantidadLetra pesos 00/100 MN)
         por concepto de concepto
    </p>
    <br>
    <h4><center>RECIBÍ</center></>
    <br>
    <br>
    <p><center>________________________</center></p>
    <!-- <br> -->
    <h4><center>nombre</center></>


</main>
</body>
</html>