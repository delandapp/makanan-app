<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\kategori_makanan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriMasakan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        kategori_makanan::truncate();
        Schema::enableForeignKeyConstraints();
        $data_role = [
            ["nama" => "food"],
            ["nama" => "drink"],
            ["nama" => "snack"],
        ];
        foreach ($data_role as $data) :
            kategori_makanan::insert([
                'name' => $data['nama'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        endforeach;
    }
}
