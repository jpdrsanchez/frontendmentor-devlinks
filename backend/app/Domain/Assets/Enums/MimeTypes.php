<?php

namespace App\Domain\Assets\Enums;

enum MimeTypes: string
{
    case PNG = 'image/png';
    case JPEG = 'image/jpeg';
    case GIF = 'image/gif';
    case WEBP = 'image/webp';
}
