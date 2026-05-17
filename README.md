<div align="center">
  <img src="https://capsule-render.vercel.app/api?type=waving&color=0:0F2027,50:203A43,100:2C5364&height=220&section=header&text=Security%20Incident%20Log%20API&fontSize=42&fontColor=ffffff&animation=fadeIn&fontAlignY=38&desc=Laravel%2013%20%7C%20SOC%20Analyst%20Portfolio%20Project&descAlignY=58&descSize=16" alt="banner" />
</div>

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-Database-003B57?style=for-the-badge&logo=sqlite&logoColor=white)
![API](https://img.shields.io/badge/REST-JSON-0A66C2?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-1f2937?style=for-the-badge)

</div>

## Overview
Security Incident Log API adalah API sederhana berbasis Laravel untuk simulasi workflow SOC Analyst.
Project ini menampilkan pengelolaan data insiden keamanan dan assignment analis dengan relasi antar tabel.

## Key Features
- Incident management (`incidents`) dengan level severity dan status.
- Analyst directory (`analysts`) dengan informasi shift.
- Many-to-many assignment (`incident_assignments`) untuk memetakan analyst ke incident.
- REST endpoint JSON untuk list dan detail incident beserta relasinya.
- Seed data siap demo untuk kebutuhan presentasi/tugas.

## Database Schema

### `incidents`
- `id`
- `title`
- `severity` (`low`, `medium`, `high`, `critical`)
- `status` (`open`, `in_progress`, `resolved`, `closed`)
- `detected_at`

### `analysts`
- `id`
- `name`
- `shift` (`morning`, `afternoon`, `night`)
- `email`

### `incident_assignments`
- `id`
- `incident_id` (FK -> `incidents.id`)
- `analyst_id` (FK -> `analysts.id`)
- `assigned_at`

## Entity Relationship
```text
incidents (1) -----< incident_assignments >----- (1) analysts
                 (many-to-many bridge)
```

## API Endpoints
| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/incidents` | Get all incidents with assigned analysts |
| GET | `/api/v1/incidents/{id}` | Get single incident detail with assigned analysts |

## Sample Response
```json
{
  "success": true,
  "message": "List incidents with assigned analysts",
  "data": [
    {
      "id": 2,
      "title": "Malicious PowerShell execution detected",
      "severity": "critical",
      "status": "open",
      "analysts": [
        {
          "id": 1,
          "name": "Rina Pratama",
          "shift": "morning",
          "email": "rina.soc@example.com"
        }
      ]
    }
  ]
}
```

## Quick Start
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

Open:
- `http://127.0.0.1:8000/api/v1/incidents`
- `http://127.0.0.1:8000/api/v1/incidents/1`

## Project Structure
```text
app/
  Http/Controllers/Api/IncidentController.php
  Models/Analyst.php
  Models/Incident.php
  Models/IncidentAssignment.php
database/
  migrations/
  seeders/IncidentSecuritySeeder.php
routes/
  api.php
```

## Academic Mapping (PBW)
- Definisi API: tersedia dalam dokumentasi dan implementasi endpoint JSON.
- Tujuan/Pemanfaatan API: backend service untuk pertukaran data incident-analyst.
- Pentingnya API: mendukung integrasi, otomasi, dan monitoring pada use case cybersecurity.
- Program sederhana + relasi tabel: terealisasi via `incidents`, `analysts`, dan `incident_assignments`.

## Tech Stack
- Laravel 13
- PHP 8.5
- SQLite (default local database)

## Author
**Mocha Rezky**

---
<div align="center">
  Built for PBW Assignment and SOC Analyst Portfolio.
</div>