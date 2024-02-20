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
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string("isbn", 100)->unique()->nullable();
            $table->string("titre", 100)->unique()->nullable();
            $table->integer("annedition")->nullable();
            $table->double("prix")->nullable();
            $table->integer("qtestock")->nullable();
            $table->string("couverture")->nullable();
            $table->unsignedBigInteger("specialite")->nullable();
            $table->foreign('specialite')
                ->references('id')
                ->on('specialites')
                ->onDelete('restrict')->nullable();
            $table->unsignedBigInteger("maised");
            $table->foreign('maised')
                ->references('id')
                ->on('editeurs')
                ->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('livres');
    }
};
