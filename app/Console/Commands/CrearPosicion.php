<?php

namespace App\Console\Commands;

use App\Http\Controllers\PosicionController;
use Illuminate\Console\Command;

class CrearPosicion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:crear-posicion {idEmpresa} {idProducto} {fechaEntregaInicio} {moneda} {precio}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear una nueva posición en la base de datos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posicionController = new PosicionController();
        $request = request()->merge([
            'idEmpresa' => $this->argument('idEmpresa'),
            'idProducto' => $this->argument('idProducto'),
            'fechaEntregaInicio' => $this->argument('fechaEntregaInicio'),
            'moneda' => $this->argument('moneda'),
            'precio' => $this->argument('precio'),
        ]);
        $response = $posicionController->store($request);

        if ($response->getStatusCode() === 201) {
            $this->info('Posicion creada correctamente: ' . $response->getContent());
        } else {
            $this->error('Error al crear la posición: ' . $response->getContent());
        }
    }
}
