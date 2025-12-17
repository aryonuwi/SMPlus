<?php

namespace App\Exports;

use App\Models\CloudCapacity;
use Maatwebsite\Excel\Concerns\FromCollection;

class CloudCapacityExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CloudCapacity::query()
            ->select(['id','cluster_id','mem','cpu','is_active','created_at','updated_at'])
            ->orderBy('id')
            ->get();
    }

    public function headings(): array
    {
        return ['id','cluster_id','mem','cpu','is_active','created_at','updated_at'];
    }
}
