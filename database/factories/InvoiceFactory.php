<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
   
    protected $model = Invoice::class;

   
    public function definition()
    {
        return [
            'subtotal'=> random_int(1000,10000),
            'total'=> random_int(5000,50000)
        ];
    }
}
