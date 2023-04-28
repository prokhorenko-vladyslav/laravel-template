<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flags', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('name');
            $table->morphs('flaggable');
            $table->timestamps();

            $table->index('name');
            $table->index('flaggable_id');
            $table->index('flaggable_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flags');
    }
};
