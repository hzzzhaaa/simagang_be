<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPackageRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_package_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("package_id");
            $table->string("nim");
            $table->string("nama_mahasiswa");
            $table->dateTime("deleted_at")->nullable();
            $table->timestamps();

            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_package_relations');
    }
}
