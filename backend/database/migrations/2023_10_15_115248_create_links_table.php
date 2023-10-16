<?php

use App\Domain\Link\Enums\Platform;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create( 'links', function ( Blueprint $table ) {
            $table->uuid( 'id' )->primary();
            $table->enum( 'platform', array_map( fn( Platform $platform ) => $platform->value, Platform::cases() ) );
            $table->string( 'url' );
            $table->string( 'position' );
            $table->foreignUuid( 'user_id' )
                  ->constrained()
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->timestamps();
        } );
    }

    public function down(): void {
        Schema::dropIfExists( 'links' );
    }
};
