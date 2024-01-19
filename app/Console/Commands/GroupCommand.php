<?php

namespace App\Console\Commands;

use App\Models\Grupo;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GroupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'group:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cambio de estado de grupos vencidos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     * PARA EJECUTAR LA TAREA NECESITAMOS CORRER php artisan group:create
     * @return int
     */
    public function handle()
    {
        $eventos = Grupo::query()
            ->where('estado', '=', 1)
            ->get();

        foreach ($eventos as $evento) {
            $fechaFin = Carbon::parse($evento->fecha_fin);
            $today = Carbon::today();

            if ($today >= $fechaFin) {
                // Actualiza el estado del grupo a false
                $evento->estado = false;
                $evento->save();
            }
        }
    }
}
