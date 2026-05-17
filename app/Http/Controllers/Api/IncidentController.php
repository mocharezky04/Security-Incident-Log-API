<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\JsonResponse;

class IncidentController extends Controller
{
    public function index(): JsonResponse
    {
        $incidents = Incident::with(['analysts:id,name,shift,email'])
            ->orderByDesc('detected_at')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'List incidents with assigned analysts',
            'data' => $incidents,
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $incident = Incident::with(['analysts:id,name,shift,email'])
            ->find($id);

        if (! $incident) {
            return response()->json([
                'success' => false,
                'message' => 'Incident not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Incident detail with assigned analysts',
            'data' => $incident,
        ]);
    }
}