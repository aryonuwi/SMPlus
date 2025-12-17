<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CapacityController extends Controller
{
    public function chart(Request $request)
    {
        $rows = DB::table('cloud_capacity as cc')
            ->join('cluster as c', 'c.id', '=', 'cc.cluster_id')
            ->where('c.is_active', true)
            ->where('cc.is_active', true)
            ->groupBy('c.id', 'c.cluster_name')
            ->orderBy('c.cluster_name')
            ->selectRaw('c.cluster_name, SUM(cc.cpu) as cpu_total, SUM(cc.mem) as mem_total')
            ->get();

        return response()->json([
            'labels' => $rows->pluck('cluster_name')->values(),
            'cpu'    => $rows->pluck('cpu_total')->values(),
            'mem'    => $rows->pluck('mem_total')->values(),
        ]);
    }
}
