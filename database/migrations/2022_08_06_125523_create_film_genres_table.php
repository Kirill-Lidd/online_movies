<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();

            $table->index('film_id', 'film_genre_film_idx');
            $table->index('genre_id', 'film_genre_genre_idx');

            $table->foreign('film_id', 'film_genre_film_fk')
            ->on('films')
            ->references('id');
            $table->foreign('genre_id', 'film_genre_genre_fk')
            ->on('genres')
            ->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_genres');
    }
}
