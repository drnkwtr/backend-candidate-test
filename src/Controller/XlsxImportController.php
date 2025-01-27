<?php

namespace App\Controller;

use App\Models\Ads;
use App\Models\AdsAdset;
use App\Models\AdsCampaign;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Spatie\SimpleExcel\SimpleExcelReader;

class XlsxImportController extends RestController
{
    protected function respondWithFileXlsx($filePath, $outputName = null, int $statusCode = 200): ResponseInterface
    {
        if (!file_exists($filePath)) {
            throw new Exception("File not found: $filePath");
        }

        $rows = SimpleExcelReader::create($filePath)->getRows();
        $adsData = [];
        foreach ($rows as $row) {
            $adsData[] = [
                'date' => $row['Дата']->format('Y-m-d'),
                'cost' => $row['Расходы'],
                'ad_id' => $row['ID объявления'],
                'name' => $row['Название объявления'],
                'adset_id' => $row['ID группы'],
                'campaign_id' => $row['ID кампании'],
                'impressions' => $row['Показы'],
                'clicks' => $row['Клики'],
            ];

            $adsetsData[] = [
                'id' => $row['ID группы'],
                'name' => $row['Название группы'],
            ];

            $campaignsData[] = [
                'id' => $row['ID кампании'],
                'name' => $row['Название кампании'],
            ];
        }
        AdsAdset::addMultiple($adsetsData);
        AdsCampaign::addMultiple($campaignsData);
        Ads::addMultiple($adsData);

        return $this->respondWithData([
            'status' => 'success',
            'data' => [
                'ads' => Ads::all(),
                'campaigns' => AdsCampaign::all(),
                'adsets' => AdsAdset::all(),
            ]
        ]);
    }

    protected function action(): ResponseInterface
    {
        // TODO: Implement action() method.
    }
}