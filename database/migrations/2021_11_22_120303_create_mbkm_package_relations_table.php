<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbkmPackageRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbkm_package_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("package_id");
            $table->unsignedBigInteger("schedule_id");
            $table->unsignedBigInteger("section_id");
            $table->integer("sks");
            $table->dateTime("deleted_at")->nullable();
            $table->timestamps();

            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mbkm_package_relations');
    }
}
