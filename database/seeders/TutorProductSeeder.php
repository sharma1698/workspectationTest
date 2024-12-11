<?php

namespace Database\Seeders;

use App\Models\TutorProduct;
use Illuminate\Database\Seeder;

class TutorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TutorProduct::factory()->count(10)->create();
    }
}
