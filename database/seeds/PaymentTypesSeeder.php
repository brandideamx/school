<?php

use Illuminate\Database\Seeder;
use App\PaymentType;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create(['name'=>'pesos']);
        PaymentType::create(['name'=>'dolares']);
        PaymentType::create(['name'=>'cheque']);
    }
}
