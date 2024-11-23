<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property__listings', function (Blueprint $table) {
            $table->id();
            $table->string('listing_id');
            $table->integer('type_id');
            $table->integer('province');
            $table->integer('amphure');
            $table->integer('tumbon');
            $table->string('address');
            $table->text('google_map')->nullable();
            $table->text('title');
            $table->text('description');
            $table->integer('price');
            $table->decimal('area_size', 10, 2)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property__listings');
    }
};
