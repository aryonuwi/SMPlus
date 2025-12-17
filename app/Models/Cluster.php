<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
     protected $table = 'cluster';
    protected $fillable = ['cluster_name', 'is_active'];

    public function capacities()
    {
        return $this->hasMany(CloudCapacity::class, 'cluster_id');
    }
}
