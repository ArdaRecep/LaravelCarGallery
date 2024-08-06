<?php
use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("slug")->unique();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->decimal('price', 12,2);
            $table->longText("description");
            $table->string('url');
            $table->string('fuel');
            $table->string('drive_type');
            $table->string('mass');
            $table->smallInteger ("doors");
            $table->smallInteger("seats");
            $table->smallInteger("hp");
            $table->smallInteger("top_speed");
            $table->string("transmission");
            $table->smallInteger("gear");
            $table->string("type");
            $table->json("images");
            $table->string("thumbnail");
            $table->smallInteger("year");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
