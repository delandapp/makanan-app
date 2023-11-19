<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();
        $data_role = [
            ["nama" => "admin"],
            ["nama" => "waiter"],
            ["nama" => "kasir"],
            ["nama" => "owner"],
            ["nama" => "pelanggan"]
        ];
        foreach ($data_role as $data) :
            Role::insert([
                'name' => $data['nama'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        endforeach;
    }
}
