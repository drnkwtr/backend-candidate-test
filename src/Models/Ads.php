<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    public $timestamps = false;
    protected $fillable = [
        'ad_id',
        'name',
        'campaign_id',
        'adset_id',
        'cost',
        'impressions',
        'clicks',
        'date',
    ];

    public static function addSingle($data)
    {
        self::query()->updateOrCreate(
            [
                'ad_id' => $data['ad_id'],
                'adset_id' => $data['adset_id'],
                'campaign_id' => $data['campaign_id'],
                'date' => $data['date'],
            ], $data);
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
