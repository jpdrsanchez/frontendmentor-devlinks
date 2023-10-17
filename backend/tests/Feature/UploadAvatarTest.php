<?php

use App\Domain\Assets\Jobs\GenerateThumbnailsJob;
use App\Domain\Assets\Models\Asset;
use Illuminate\Http\UploadedFile;

test('example', function () {
    $file = UploadedFile::fake()->image('avatar.jpg', 800, 600)->size(2000);

    $response = $this->postJson('/api/v1/upload', ['file' => $file]);

    $response->dd();

    $response->assertStatus(201);

    $filename = $file->store();
    $asset = new Asset;
    $asset->name = $filename;
    $asset->mimetype = $file->getMimeType();
    $asset->save();

    GenerateThumbnailsJob::dispatchSync($asset);
    $asset->refresh();
    dd($asset);
});
