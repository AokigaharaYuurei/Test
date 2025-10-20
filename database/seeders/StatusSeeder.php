<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statuses')->insert(
            [
                [
                    'name' => "новое"
                ],
                [
                    'name' => "подтверждено"
                ],
                [
                    'name' => "отклонено"
                ]
            ]
            );
    }
}
