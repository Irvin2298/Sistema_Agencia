<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use App\Models\User;
use App\Models\Recibo;
use Illuminate\Support\Facades\DB;
use PDF;
// use App\Models\Cargo;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReciboGeneradoController extends Controller
{
    public $ver = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $query = Recibo::query();
        $recibos = $query->get();
        return view('documentos.recibos', compact('recibos'));
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

    public function crearRecibo($id)
    {

        $recibo = Recibo::find($id);

        $nombre = $recibo->nombre;
        $apellido_p = $recibo->apellido_paterno;
        $apellido_m = $recibo->apellido_materno;
        $cant_num = $recibo->cantidad_numero;
        $cant_let = $recibo->cantidad_letra;
        $fecha = $recibo->fecha;
        $fecha=$this->formatoFecha($fecha);
        $fecha_creacion = $recibo->fecha_creacion;
        $fecha_creacion=$this->formatoFecha($fecha_creacion);
        $concepto = $recibo->concepto;

        $nom = $nombre ." ". $apellido_p. " "  .$apellido_m;

        $data = ['nombre' => $nom,
                 'cantidad_num' => $cant_num,
                 'cantidad_let' => $cant_let,
                 'fecha' => $fecha,
                 'fecha_creacion' => $fecha_creacion,
                 'concepto' => $concepto
                ];

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('plantillas.reciboAntiguo', $data);
        $pdf->set_option('defaultFont', 'Arial');
        return $pdf->stream('Recibo de '. $data['nombre'] .'.pdf');


        // $pdf = PDF::loadView('plantillas.recibo');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        //return view('plantillas.recibo');
    }

    public function crearNombramiento($id)
    {
        $nombramiento = Nombramiento::find($id);

        $nombre = $nombramiento->nombre;
        $apellido_p = $nombramiento->apellido_paterno;
        $apellido_m = $nombramiento->apellido_materno;
        $cargo = $nombramiento->cargo;
        $fecha_ini = $nombramiento->fecha_inicio;
        $fecha_ini=$this->formatoFecha($fecha_ini);
        $fecha_fin = $nombramiento->fecha_fin;
        $fecha_fin=$this->formatoFecha($fecha_fin);
        $fecha=$nombramiento->fecha_creación;
        $fecha=$this->formatoFecha($fecha);

        $agente = $nombramiento->nombre_agente;

        $data = ['nombre' => $nombre,
                'apellido_p'=>$apellido_p,
                'apellido_m'=>$apellido_m,
                'cargo' => $cargo,
                'fecha_ini' => $fecha_ini,
                'fecha_fin' => $fecha_fin,
                'fecha_actual' => $fecha,
                'agente' => $agente];

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('plantillas.nombramientoAntiguo', $data);
        $pdf->set_option('defaultFont', 'Arial');
        return $pdf->stream('Nombramiento de '. $data['nombre'] .'.pdf');
    }

    public function obtenerFecha()
    {
        // Obtener la fecha y hora actual
        $fechaActual = Carbon::now();

        // También puedes formatear la fecha según tus necesidades
        $fechaFormateada = $fechaActual->format('Y-m-d');
        return $fechaFormateada;
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

    public function eliminarId($id)
    {
        DB::table('recibos')->whereId($id)->delete();

        return redirect()->route('documentos.recibos')->with('success', 'Recibo eliminado exitosamente.');
    }
}
