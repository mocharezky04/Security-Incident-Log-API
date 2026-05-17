<?php

namespace Database\Seeders;

use App\Models\Analyst;
use App\Models\Incident;
use Illuminate\Database\Seeder;

class IncidentSecuritySeeder extends Seeder
{
    public function run(): void
    {
        $analystA = Analyst::create([
            'name' => 'Rina Pratama',
            'shift' => 'morning',
            'email' => 'rina.soc@example.com',
        ]);

        $analystB = Analyst::create([
            'name' => 'Fajar Ramadhan',
            'shift' => 'night',
            'email' => 'fajar.soc@example.com',
        ]);

        $incidentA = Incident::create([
            'title' => 'Brute force attack on VPN gateway',
            'severity' => 'high',
            'status' => 'in_progress',
            'detected_at' => now()->subHours(5),
        ]);

        $incidentB = Incident::create([
            'title' => 'Malicious PowerShell execution detected',
            'severity' => 'critical',
            'status' => 'open',
            'detected_at' => now()->subHours(2),
        ]);

        $incidentA->analysts()->attach($analystA->id, ['assigned_at' => now()->subHours(4)]);
        $incidentB->analysts()->attach($analystA->id, ['assigned_at' => now()->subHour()]);
        $incidentB->analysts()->attach($analystB->id, ['assigned_at' => now()->subMinutes(45)]);
    }
}