<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloudCapacity extends Model
{
    protected $table = 'cloud_capacity';
    protected $fillable = ['cluster_id', 'mem', 'cpu', 'is_active'];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'cluster_id');
    }
}
