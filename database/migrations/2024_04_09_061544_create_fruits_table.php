<?php

use App\Enums\UnitEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->decimal('price');
            $table->enum('unit', UnitEnum::toValues());
            $table->unsignedInteger('stock');
            $table->foreignId('category_id')->constrained('fruit_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fruits');
    }
};
