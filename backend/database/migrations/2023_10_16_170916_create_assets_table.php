<?php

use App\Domain\Assets\Enums\MimeTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create( 'assets', function ( Blueprint $table ) {
            $table->uuid( 'id' )->primary();
            $table->string( 'name' );
            $table->enum( 'mimetype', array_map( fn( MimeTypes $mime ) => $mime->value, MimeTypes::cases() ) );
            $table->json( 'metadata' )->nullable();
            $table->timestamps();
        } );
    }

    public function down(): void {
        Schema::dropIfExists( 'assets' );
    }
};
