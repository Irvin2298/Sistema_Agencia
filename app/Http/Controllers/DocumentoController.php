<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;
// use App\Models\Cargo;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public $ver = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return view('documentos.index');
    }

    private function formatoFecha($fecha){
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        // $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_ES = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOBIEMBRE", "DICIEMBRE");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $numeroDia." DE ".$nombreMes." DEL ".$anio;
    }

    public function crearRecibo(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido_p = $request->input('apellido_p');
        $apellido_m = $request->input('apellido_m');
        $cantidad_numero = $request->input('cantidad_numero');
        $cantidad_letra = $request->input('cantidad_letra');
        $fecha_recibo = $request->input('fecha_recibo');
        $fecha_recibo = $this->formatoFecha($fecha_recibo);
        $concepto_recibo = $request->input('concepto_recibo');
        $nom = $nombre ." ". $apellido_p. " "  .$apellido_m;


        $data = ['nombre' => $nom,
                 'cantidad_num' => $cantidad_numero,
                 'cantidad_let' => $cantidad_letra,
                 'fecha' => $fecha_recibo,
                 'concepto' => $concepto_recibo,];

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('plantillas.recibo', $data);
        $pdf->set_option('defaultFont', 'Arial');
    return $pdf->stream('Recibo de '. $nom .' ('. $fecha_recibo . ').pdf');


        // $pdf = PDF::loadView('plantillas.recibo');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        //return view('plantillas.recibo');
    }

    public function crearCitatorio(Request $request)
    {
        $nombre = $request->input('nombre');
        $fecha_c = $request->input('fecha_citatorio');
        $fecha=$this->convertirFecha($fecha_c);
        $hora = $request->input('hora');

        $now=$this->convertirFecha(Carbon::now()->format('d-m-Y'));

        $rolEspecifico = 'Agente Municipal';
        $agente = User::whereHas('roles', function ($query) use ($rolEspecifico) {
                        $query->where('name', $rolEspecifico);
                        })->first();

        $data = ['nombre' => $nombre,
                'fecha_c'=>$fecha,
                'hora' => $hora,
                'hoy' => $now,
                'agente' => $agente->name];

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('plantillas.citatorio', $data);
        $pdf->set_option('defaultFont', 'Arial');
        return $pdf->stream('Recibo de '. $nombre .' ('. $fecha_c . ').pdf');
    }

    public function convertirFecha($fecha) {
        $fechaCarbon = Carbon::parse($fecha);
        $dia = $fechaCarbon->format('d');
        $mes = '';
        switch ($fechaCarbon->format('m')) {
            case 1:
                $mes = 'enero';
                break;
            case 2:
                $mes = 'febrero';
                break;
            case 3:
                $mes = 'marzo';
                break;
            case 4:
                $mes = 'abril';
                break;
            case 5:
                $mes = 'mayo';
                break;
            case 6:
                $mes = 'junio';
                break;
            case 7:
                $mes = 'julio';
                break;
            case 8:
                $mes = 'agosto';
                break;
            case 9:
                $mes = 'septiembre';
                break;
            case 10:
                $mes = 'octubre';
                break;
            case 11:
                $mes = 'noviembre';
                break;
            case 12:
                $mes = 'diciembre';
                break;
        }
        $año = $fechaCarbon->format('Y');

        // Devolver el texto formateado
        return "$dia de $mes del $año";
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'apellido_p' => 'required',
            'apellido_m' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'curp' =>  ['required', 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/', 'unique:ciudadanos'],
            'num_telefonico' => 'required|regex:/^[0-9]{10}$/',
            'calle' => 'required',
            'num_calle' => 'required',
            'num_exterior' => 'required',
            'num_interior' => 'required',
            'referencia' => 'required',
        ]);
        $ciudadanoData = $request->all();
        $ciudadanoData['estado'] = true;
        $ciudadanoData['observaciones'] = " ";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudadano $ciudadano)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudadano $ciudadano)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudadano $ciudadano)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudadano $ciudadano)
    {

    }
}
