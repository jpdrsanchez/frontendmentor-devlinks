<?php

namespace App\Domain\Assets\DTO;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class AssetData extends Data
{
    public function __construct(
        public UploadedFile $file
    ) {
    }
}
