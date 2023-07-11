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
        $customer = Customer::query()->where('email', 'lehatybg1@gmail.com')->first();
        if (empty($customer)) {
            return;
        }

        Admin::query()->updateOrCreate([
            'email' => $customer->email,
            'user_id' => $customer->id,
        ], [
            'is_active' => true,
            'password' => Hash::make('admin@123@!')
        ]);
    }
}
