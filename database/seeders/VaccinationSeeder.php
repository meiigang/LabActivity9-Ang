<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vaccination;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $rows = [
        ['patient_name' => 'Lorraine Veloso', 'purok' => 'Purok 3', 'vaccine' => 'BCG',
         'dose' => '1st dose', 'scheduled_at' => '2026-11-03', 'status' => 'Scheduled'],
        ['patient_name' => 'Chiyong Manalo', 'purok' => 'Purok 8', 'vaccine' => 'Anti-Flu',
         'dose' => 'Annual', 'scheduled_at' => '2026-10-20', 'status' => 'Done'],
        ['patient_name' => 'River Santos', 'purok' => 'Purok 4', 'vaccine' => 'OPV',
        'dose' => 'Annual', 'scheduled_at' => '2026-10-28', 'status' => 'Overdue'],
        ['patient_name' => 'Elliott Smith', 'purok' => 'Purok 1', 'vaccine' => 'Pentavalent',
        'dose' => '1st dose', 'scheduled_at' => '2026-10-10', 'status' => 'Done'],
        ['patient_name' => 'Daniella Cruz', 'purok' => 'Purok 2', 'vaccine' => 'MMR',
        'dose' => '1st dose', 'scheduled_at' => '2026-08-17', 'status' => 'Done'],
        ['patient_name' => 'Hannah Lee', 'purok' => 'Purok 5', 'vaccine' => 'Anti-Flu',
        'dose' => 'Monthly', 'scheduled_at' => '2026-11-26', 'status' => 'Scheduled'],
        // ... Pentavalent, OPV, MMR, your own vaccine, your birthday row
        ];
        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
