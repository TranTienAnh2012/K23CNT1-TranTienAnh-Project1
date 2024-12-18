<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ttaquantri extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $ttaMatKhau = Hash::make('20122005');
    
            DB::table('tta_quantri')->insert([
                'ttaTaiKhoan' => 'tienanhtran775@gmail.com',
                'ttaMatKhau' => $ttaMatKhau,
                'ttaTrangThai' => 0
            ]);
        
    }
}
