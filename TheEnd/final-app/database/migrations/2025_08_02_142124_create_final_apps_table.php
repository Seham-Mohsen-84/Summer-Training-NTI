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
        Schema::create('final_apps', function (Blueprint $table) {
            $table->id();
            // Article title (string field)
            $table->string('title');
            // Article content (text field for longer content)
            $table->text('body');
            // Foreign key to users table - links article to its author
            // onDelete('cascade') means if user is deleted, their articles are also deleted
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_apps');
    }
};
