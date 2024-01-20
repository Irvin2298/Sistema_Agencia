<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use Illuminate\Support\Facades\DB;
use PDF;
// use App\Models\Cargo;

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

    public function crearRecibo(Request $request)
    {
        $data = ['key' => 'value'];

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('plantillas.recibo', $data);
        $pdf->set_option('defaultFont', 'Arial');
    return $pdf->stream('invoice.pdf');
        

        // $pdf = PDF::loadView('plantillas.recibo');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        //return view('plantillas.recibo');
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
