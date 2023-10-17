<?php

namespace App\Domain\Assets\DTO;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Mimes;
use Spatie\LaravelData\Data;

class AssetData extends Data
{
    public function __construct(
        #[Mimes(['jpg', 'png', 'svg', 'gif', 'webp'])]
        public UploadedFile $file
    ) {
    }
}
