<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdsCampaign extends Model
{
    protected $table = 'campaigns';
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public static function addSingle($data)
    {
        self::query()->updateOrCreate(['id' => $data['id']], $data);
    }

    public static function addMultiple($data)
    {
        foreach ($data as $item) {
            self::addSingle($item);
        }
    }

    public static function removeSingle($data)
    {
        return self::query()->where('id', $data['id'])->delete();
    }

    public static function updateSingle($data, $updated_data)
    {
        return self::query()->where('id', $data['id'])->update($data);
    }
}