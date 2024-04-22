<?php

require __DIR__ . '/../../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

function view_qr(string $text)
{   //if homeowner is added but vehicle is not yet registered, value is 0
    $qr_code = QrCode::create($text)
        ->setSize(250)
        ->setMargin(40)
        ->setForegroundColor(new Color(56, 86, 65))
        // ->setBackgroundColor(new Color(153, 204, 255))
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh);

    $writer = new PngWriter;

    $result = $writer->write($qr_code);

    // Return the QR code image data
    return $result->getString();
}

function save_qr_code(string $qr_id, string $qr)
{   //if homeowner is added but vehicle is not yet registered, value is 0
    $qr_code = QrCode::create($qr)
        ->setSize(200)
        ->setMargin(40)
        ->setForegroundColor(new Color(56, 86, 65))
        // ->setBackgroundColor(new Color(153, 204, 255))
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh);

    $writer = new PngWriter;

    $result = $writer->write($qr_code);
    $result->saveToFile("../../public/img/$qr_id.png");
}
