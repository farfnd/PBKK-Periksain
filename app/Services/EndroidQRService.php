<?php

namespace App\Services;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeEnlarge;
use Endroid\QrCode\Writer\PngWriter;

class EndroidQRService
{
    public function generateQR($data)
    {
        $result = Builder::create()
                ->writer(new PngWriter())
                ->writerOptions([])
                ->data($data)
                ->encoding(new Encoding('UTF-8'))
                ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->size(150)
                ->margin(10)
                ->roundBlockSizeMode(new RoundBlockSizeModeEnlarge())
                ->build();

        header('Content-Type: '.$result->getMimeType());
        return $result->getDataUri();
    }
}
