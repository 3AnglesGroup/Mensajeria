<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClietesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = new Cliente();
        $cliente->razon_social = 'Alta Gama Club';
        $cliente->ciudad = 'Barranquilla';
        $cliente->correo = 'altagamaclub@gmail.com';
        $cliente->nombre_contacto = 'Natalia Duque';
        $cliente->tel_contacto = '31120023';
        $cliente->save();

        $cliente = new Cliente();
        $cliente->razon_social = 'Sotecsis';
        $cliente->ciudad = 'Bogota';
        $cliente->correo = 'sotecsis@gmail.com';
        $cliente->nombre_contacto = 'juancho';
        $cliente->tel_contacto = '31120023';
        $cliente->save();
    }
}
