<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\QRCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::query()->where('email', 'y.do@bachquang.vn')->first();
        if (empty($customer)) {
            return;
        }

        Admin::query()->updateOrCreate([
            'email' => $customer->email,
            'customer_id' => $customer->id,
            'customer_uid' => $customer->uid,
        ], [
            'name' => $customer->displayName ?? $customer->email,
            'is_active' => true,
            'password' => Hash::make('admin@123@!')
        ]);
    }
}
