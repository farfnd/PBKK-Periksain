<?php

namespace App\Services;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRService
{
    public function generateQR($data)
    {
        return QrCode::size(150)->generate($data);
    }
}
