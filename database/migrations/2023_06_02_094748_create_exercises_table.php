<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('exercises', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('muscle_group');
			$table->text('description')->nullable();
			$table->integer('calories_per_minute')->nullable();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('exercises');
	}
};
