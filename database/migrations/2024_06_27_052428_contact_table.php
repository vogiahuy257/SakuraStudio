<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Migration cho bảng files
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->string('filename');
            $table->timestamps(); 
            $table->softDeletes(); 
        });

        // Migration cho bảng fields
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained('files')->onDelete('cascade');
            $table->string('field_name');
            $table->string('field_type');
            $table->timestamps(); // Thêm cột created_at và updated_at
        });

        // Migration cho bảng field_values
        Schema::create('field_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->integer('record_id');
            $table->text('value')->nullable();
            $table->timestamps(); // Thêm cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('field_values');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('files');
    }
}
