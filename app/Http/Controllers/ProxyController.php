<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProxyController extends Controller
{
    public function typeGender()
    {
        $response = Http::withHeaders([
            'username' => config('api.username'),
            'token' => config('api.token'),
            'idPerson' => 1,
        ])->get(config('api.url') . '/admin/type-gender', [
            'sort_by' => 'id',
            'sort_order' => 'asc',
        ]);

        return response()->json($response->json());
    }

    public function typeGroup()
    {
        $response = Http::withHeaders([
            'username' => config('api.username'),
            'token' => config('api.token'),
            'idPerson' => 1,
        ])->get(config('api.url') . '/admin/type-group', [
            'sort_order' => 'asc',
        ]);

        return response()->json($response->json());
    }

    
}
