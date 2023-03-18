<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStoragePivotTable extends Migration
{
    public function up()
    {
        Schema::create('project_storage', function (Blueprint $table) {
            $table->unsignedBigInteger('storage_id');
            $table->foreign('storage_id', 'storage_id_fk_8208703')->references('id')->on('storages')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_8208703')->references('id')->on('projects')->onDelete('cascade');
        });
    }
}
