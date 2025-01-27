<?php

namespace App\Routes;

use App\Controller\RestController;
use App\Controller\XlsxImportController;
use App\Models\Test;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class UploadAdsXlsx extends XlsxImportController
{
    public function action(): ResponseInterface
    {
        try {
            return $this->respondWithFileXlsx($filePath = '../var/excel/ads.xlsx', $outputName = null, $statusCode = 200,);

        } catch (Throwable $e) {
            return $this->respondWithError(253, $e->getMessage());
        }
    }

}