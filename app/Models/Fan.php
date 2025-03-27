<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    use HasFactory;
    protected $table = 'fans';
    protected $fillable = [
        'fan_type',
        'CPU_socket',
        'height',
        'fan_size',
        'led_type'
    ];
    const TYPE_AIRFAN = 'AirFan';
    const TYPE_AIOFAN = 'AIOFan';
    const TYPE_CASEFAN = 'CaseFan';
    public static $listType = [
        self::TYPE_AIRFAN => 'Air Fan',
        self::TYPE_AIOFAN => 'AIO Fan',
        self::TYPE_CASEFAN => 'Case Fan'
    ];
    public function detail(){
        return $this->hasOne(Accessory::class);
    }
    public static function getFanType($type){
        return self::where('fan_type', $type)
            ->join('accessories', 'accessories.detail_id', '=', 'fans.id')
            ->where('accessories.type', Accessory::TYPE_FAN)
            ->join('products', 'products.detail_id', '=', 'accessories.id')
            ->select('products.id as product_id', 'products.name as product_name')
            ->get();
    }

}
