<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\CloudCapacityReportMail;
use App\Models\CloudCapacity;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function download(): StreamedResponse
    {
        // 1. Kirim email notifikasi
        if ($to = env('REPORT_RECIPIENT_EMAIL')) {
            Mail::to($to)->send(
                new CloudCapacityReportMail(env('CANDIDATE_NAME', 'Aryo Nurwanto Wicaksono'))
            );
        }

        // 2. Stream CSV (Excel-compatible)
        $fileName = 'cloud_capacity.csv';

        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');

            // header
            fputcsv($handle, [
                'id',
                'cluster_id',
                'mem',
                'cpu',
                'is_active',
                'created_at',
                'updated_at',
            ]);

            CloudCapacity::query()
                ->orderBy('id')
                ->chunk(500, function ($rows) use ($handle) {
                    foreach ($rows as $r) {
                        fputcsv($handle, [
                            $r->id,
                            $r->cluster_id,
                            $r->mem,
                            $r->cpu,
                            $r->is_active ? 1 : 0,
                            $r->created_at,
                            $r->updated_at,
                        ]);
                    }
                });

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
