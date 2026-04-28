<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Konsultasi Bisnis',
                'slug' => Str::slug('Konsultasi Bisnis'),
                'description' => 'Sesi konsultasi 1 jam untuk strategi perang dunia.',
                'price' => 500000,
                'duration' => 60,
            ],
            [
                'name' => 'Foto Produk Katalog',
                'slug' => Str::slug('Foto Produk Katalog'),
                'description' => 'Paket foto produk untuk marketplace.',
                'price' => 1200000,
                'duration' => 180,
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
