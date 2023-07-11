<?php

namespace Database\Seeders;

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
        $currentNow = Carbon::now();
        User::query()->updateOrCreate([
            'email' => 'admin@miraway.vn',
        ], [
            'name' => 'admin',
            'email' => 'admin@miraway.vn',
            'email_verified_at' => $currentNow,
            'password' => Hash::make('admin@123@!')
        ]);

        User::query()->updateOrCreate([
            'email' => 'user@miraway.vn',
        ], [
            'name' => 'user',
            'email' => 'user@miraway.vn',
            'email_verified_at' => $currentNow,
            'password' => Hash::make('admin@123@!')
        ]);

        $qrcodeList = [
            [
                'name' => 'Medent',
                'code' => 'VO1iuLOCIjRHYvnHoD31',
                'url' => 'https://app.qrcode-solution.com/#/scanner/EPPaMD',
            ],
            [
                'name' => 'Medent',
                'code' => '17a7n0mWr3IfsezYszB3',
                'url' => 'https://app.qrcode-solution.com/#/scanner/ZZuhL7',
            ],
            [
                'name' => 'Kim Nguyên',
                'code' => 'ITLAs0i4zdT7bpaXudW9',
                'url' => 'https://donghetop.vn',
            ],
            [
                'name' => 'Boston',
                'code' => 'KNUQE3cjOG5EtoNyAEhm',
                'url' => 'https://bostonpharma.com.vn/vn/kim-tien-thao.html',
            ],
            [
                'name' => 'Boston',
                'code' => 'bdQVGdrmDrmGMgzKeb6d',
                'url' => 'https://bostonpharma.com.vn/vn/bostacet.html'
            ],
            [
                'name' => 'Sơn Hà Nội',
                'code' => 'Rery5cbGw7s6JlE8AI1Z',
                'url' => 'https://bostonpharma.com.vn/vn/paralmax-pain.html'
            ],
            [
                'name' => 'Sơn Hà Nội',
                'code' => 'w0Alu8jp53K59R85jPI2',
                'url' => 'https://sonhanoi.com.vn'
            ],
            [
                'name' => 'Sơn Hà Nội',
                'code' => 'KTdoEyH5YKCvJl7fbtR8',
                'url' => 'https://sonhanoi.com.vn'
            ]
        ];

        foreach ($qrcodeList as $qrcode) {
            if (empty($qrcode['code'])) {
                continue;
            }

            QRCode::query()->updateOrCreate([
                'code' => $qrcode['code']
            ], $qrcode);
        }
    }
}
