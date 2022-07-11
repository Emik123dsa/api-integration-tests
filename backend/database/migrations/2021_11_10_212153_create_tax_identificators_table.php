<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxIdentificatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_identificators', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('tax_id')->unique();

            $table->unsignedTinyInteger('identificator_scheme')->nullable(false);
            $table->char('identificator_charset')->nullable(false);

            $table->uuid('identification_number_id')->unique();

            $table->timestamps();

            $table->primary(['id', 'tax_id', 'identification_number_id']);

            $table->foreign('tax_id')
                ->references('id')
                ->on('taxes')
                ->onDelete('cascade');

            $table->foreign('identification_number_id')
                ->references('id')
                ->on('tax_identification_numbers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_identificators');
    }
}
