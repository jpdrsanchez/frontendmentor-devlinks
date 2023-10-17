<?php

namespace App\Domain\Assets\Actions;

use App\Domain\Assets\DTO\AssetData;
use App\Domain\Assets\Jobs\GenerateThumbnailsJob;
use App\Domain\Assets\Models\Asset;

class UploadAction {
    public function execute( AssetData $data ): void {
        $storedPath = $data->file->store();

        $asset           = new Asset;
        $asset->name     = $storedPath;
        $asset->mimetype = $data->file->getMimeType();
        $asset->save();

        GenerateThumbnailsJob::dispatch( $asset );
    }
}
