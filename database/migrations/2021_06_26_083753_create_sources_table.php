<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('webcomic_id');
            $table->string('homepage');
            $table->string('searchpage')->nullable();
            $table->string('searchstring')->nullable();
            $table->string('searchstring_title')->nullable();
            $table->string('searchstring_description')->nullable();
            $table->string('scraper');
            $table->string('lang')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamp('last_scraped_at')->nullable();
            $table->unsignedInteger('failed_attempts')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sources');
    }
}
