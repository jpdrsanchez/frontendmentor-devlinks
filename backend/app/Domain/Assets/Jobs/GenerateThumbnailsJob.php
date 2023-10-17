<?php

namespace App\Domain\Assets\Jobs;

use App\Domain\Assets\Models\Asset;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GenerateThumbnailsJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    protected array $sizes = [ 'large' => [ 193, 193 ], 'medium' => [ 104, 104 ], 'small' => [ 96, 96 ] ];

    public function __construct( protected Asset $asset ) {
    }

    public function handle(): void {
        $assetMeta         = $this->asset->metadata;
        $originalImagePath = Storage::path( $this->asset->name );
        $originalImageName = explode( '.', $this->asset->name )[0];
        $destinationPath   = storage_path( 'app/' ) . config( 'filesystems.default' );

        $imageInstance = Image::make( $originalImagePath )
                              ->save( "$destinationPath/$originalImageName.webp" );

        $sizes = [
            "default" => [
                "file"   => "$imageInstance->filename.webp",
                "mime"   => $imageInstance->mime(),
                "width"  => $imageInstance->getWidth(),
                "height" => $imageInstance->getHeight()
            ]
        ];

        foreach ( $this->sizes as $name => $size ) {
            $imageInstance
                ->fit( $size[0], $size[1], function ( $constraint ) {
                    $constraint->upsize();
                } )
                ->save( "$destinationPath/$originalImageName-$size[0]x$size[1].webp" );

            $sizes[ $name ] = [
                "file"   => "$imageInstance->filename.webp",
                "mime"   => $imageInstance->mime(),
                "width"  => $imageInstance->getWidth(),
                "height" => $imageInstance->getHeight()
            ];
        }

        $assetMeta['sizes']    = $sizes;
        $this->asset->metadata = $assetMeta;
        $this->asset->save();
    }
}
