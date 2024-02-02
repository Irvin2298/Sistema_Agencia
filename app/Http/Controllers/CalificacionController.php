<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargos_has_ciudadano;
use App\Models\Ciudadano;
use App\Models\User;
use PDF;
use Carbon\Carbon;
class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Cargos_has_ciudadano::query()
            ->join('grupos', 'grupos.id', '=', 'cargos_has_ciudadanos.grupo_id')
            ->join('ciudadanos', 'ciudadanos.id', '=', 'cargos_has_ciudadanos.ciudadano_id')
            ->join('cargos','cargos.id', '=', 'grupos.cargo_id')
            ->select(
                'cargos_has_ciudadanos.id as idd',
                'cargos_has_ciudadanos.aprobado as apro',
                'cargos_has_ciudadanos.observacion as observacion',
                'ciudadanos.id as idciudadano',
                'ciudadanos.nombre as ciudadano',
                'ciudadanos.apellido_p as ap',
                'ciudadanos.apellido_m as am',
                'grupos.nombre as grupo',
                'grupos.fecha_inicio as fi',
                'grupos.fecha_fin as ff',
                'cargos.nombre as cargo'
            );

    // Aplicar filtros según la solicitud
    if (!$request->has('reset_filtro')) {
        // No aplicar ningún filtro
        if ($request->has('filtro')) {
            switch ($request->get('filtro')) {
                case 'filtro1':
                    $query->where('aprobado', '=', 1);
                    break;
                case 'filtro2':
                    $query->where('aprobado', '=', 0);
                    break;
            }
        }

        $inscripciones = $query->get();

        return view('calificaciones.index', compact('inscripciones'));
    }
    $inscripciones = $query->get();
    return view('calificaciones.index', compact('inscripciones'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
           'aprobado' => 'required',
           'observacion'=> 'required',
        ]);
        // $ciudadanoData = $request->all();
        // $ciudadanoData['aprobado'] = false;
        // $ciudadanoData['ciudadano_id'] = $ciudadanoId;

        // Cargos_has_ciudadano::create($ciudadanoData);

        Cargos_has_ciudadano::create($request->all());

        return redirect()->route('calificaciones.index')->with('success', 'Calificacion registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargos_has_ciudadano $inscripcion)
    {
         request()->validate([
            'aprobado' => 'required',
            'observacion' => 'required',
        ]);

        $inscripcion->update($request->all());

        return redirect()->route('calificacion.index')->with('success', 'Calificación actualizada exitosamente.');
    }

    public function crearConstancia($idd)
    {
        $query = Cargos_has_ciudadano::query()
        ->join('grupos', 'grupos.id', '=', 'cargos_has_ciudadanos.grupo_id')
        ->join('ciudadanos', 'ciudadanos.id', '=', 'cargos_has_ciudadanos.ciudadano_id')
        ->join('cargos','cargos.id', '=', 'grupos.cargo_id')
        ->select(
            'ciudadanos.nombre as ciudadano',
            'ciudadanos.apellido_p as ap',
            'ciudadanos.apellido_m as am',
            'ciudadanos.sexo as sex',
            'grupos.nombre as grupo',
            'grupos.fecha_inicio as fi',
            'grupos.fecha_fin as ff',
            'cargos.nombre as cargo'
        )
        ->where('cargos_has_ciudadanos.id', '=', $idd)
        ->first();  // Cambiar de get() a first() para obtener un solo resultado

        $rolEspecifico = 'Agente Municipal';
        $agente = User::whereHas('roles', function ($query) use ($rolEspecifico) {
                        $query->where('name', $rolEspecifico);
                        })->first();
        $fecha = $this->obtenerfecha();
        $fechaActual = $this->formatoFecha($fecha);

        $data = ['ciudadano' => $query->ciudadano,
                'apellido_p' => $query->ap,
                'apellido_m' => $query->am,
                'sexo' => $query->sex,
                'grupo' => $query->grupo,
                'cargo' => $query->cargo,
                'fecha_ini'=>$this->convertirFecha($query->fi),
                'fecha_fin' => $this->convertirFecha($query->ff),
                'agente' => $agente->name,
                'fecha_actual' => $fechaActual];



        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('plantillas.constancia', $data);
        $pdf->set_option('defaultFont', 'Arial');
        return $pdf->stream('Nombramiento de '. $data['ciudadano'] .'.pdf');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function obtenerFecha()
    {
        // Obtener la fecha y hora actual
        $fechaActual = Carbon::now();

        // También puedes formatear la fecha según tus necesidades
        $fechaFormateada = $fechaActual->format('Y-m-d');
        return $fechaFormateada;
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

}
