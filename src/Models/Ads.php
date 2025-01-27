<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'name',
        'campaign_id',
        'set_id',
        'cost',
        'impressions',
        'clicks',
        'date',
    ];

    public static function addSingle($attributes, $values)
    {
        self::query()->updateOrCreate($attributes, $values);
    }

    public static function addMultiple($attributes, $values)
    {
        foreach ($values as $value) {
            self::addSingle($attributes, $value);
        }
    }

    public static function removeSingle($data)
    {
        return self::query()->where($data)->delete();
    }

    public static function updateSingle($data, $updated_data)
    {
        return self::query()->where($data)->update($updated_data);
    }
}
