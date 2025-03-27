<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    use HasFactory;
    protected $table ='cpus';
    protected $fillable = [
        'core_type',
        'core_series',
        'socket'
    ];
    public function detail(){
        return $this->hasOne(Accessory::class);
    }

}
