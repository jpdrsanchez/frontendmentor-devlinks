<?php

use Illuminate\Http\UploadedFile;

afterAll(function () {
    if (is_dir(storage_path('app/testing'))) {
        $files = glob(storage_path('app/testing').'/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
});

it('should be able to upload an user avatar', function () {
    $file = UploadedFile::fake()->image('avatar.jpg', 800, 600)->size(2000);

    $response = $this->postJson('/api/v1/upload', ['file' => $file]);

    $response->assertStatus(201);
});
