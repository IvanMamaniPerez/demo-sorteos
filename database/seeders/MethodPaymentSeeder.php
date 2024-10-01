<?php

namespace Database\Seeders;

use App\Enums\MethodPaymentTypeEnum;
use App\Models\MethodPayment;
use Illuminate\Database\Seeder;

class MethodPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MethodPayment::create([
            'name'   => 'Efectivo',
            'type'   => MethodPaymentTypeEnum::CASH,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'Yape',
            'type'   => MethodPaymentTypeEnum::E_WALLET,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'Plin',
            'type'   => MethodPaymentTypeEnum::E_WALLET,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'Binance',
            'type'   => MethodPaymentTypeEnum::E_WALLET,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'PayPal',
            'type'   => MethodPaymentTypeEnum::E_WALLET,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'Transferencia bancaria',
            'type'   => MethodPaymentTypeEnum::BANKED,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'Deposito en cuenta',
            'type'   => MethodPaymentTypeEnum::BANKED,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'Tarjeta de crédito',
            'type'   => MethodPaymentTypeEnum::BANKED,
            'status' => 'active',
        ]);

        MethodPayment::create([
            'name'   => 'Tarjeta de débito',
            'type'   => MethodPaymentTypeEnum::BANKED,
            'status' => 'active',
        ]);
    }
}
