<?php

namespace App\Infra\Http\Controllers;

use App\Domain\Assets\Actions\UploadAction;
use App\Domain\Assets\DTO\AssetData;

class UploadController extends Controller {
    public function __construct( protected UploadAction $upload ) {
    }

    public function __invoke( AssetData $request ) {
        $this->upload->execute( $request );

        return response()->json( [
            'message' => 'success',
        ], 201 );
    }
}
