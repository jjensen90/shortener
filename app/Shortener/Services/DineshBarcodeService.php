<?php namespace Shortener\Services;

use DNS2D;

/**
 * Interface DineshBarcodeService
 * @package Shortener\Services
 */
class DineshBarcodeService implements BarcodeServiceInterface
{

    /**
     * {@inheritdoc}
     *
     * Takes a string and encodes it as a QR code
     */
    public function generateQrCode($input)
    {
        return DNS2D::getBarcodePNG($input, 'QRCODE', 5,5);
    }

}