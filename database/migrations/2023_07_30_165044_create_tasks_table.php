<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { // php artisan make:model Task -m => this creates Task .php in model and tasks table in database
        Schema::create('tasks', function (Blueprint $table) {

            $table->id(); // this will automatically be primary key

            $table->string('title');
            $table->text('description');
            $table->text('long-description')->nullable();
            $table->boolean('complete')->default(false);

            $table->timestamps();
            // to apply migration we run php artisan migrate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};