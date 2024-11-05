<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // This will create the 'id' column
            $table->string('filepath'); // Just define 'filepath' without 'after'
            $table->timestamps(); // This creates 'created_at' and 'updated_at'
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};


