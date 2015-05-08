<?php namespace Shortener\Services;

/**
 * Interface BarcodeServiceInterface
 * @package Shortener\Services
 */
interface BarcodeServiceInterface
{

    /**
     * @param $input string
     * @return mixed
     */
    public function generateQrCode($input);

}