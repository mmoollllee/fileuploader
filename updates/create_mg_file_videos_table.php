<?php namespace MG\FileOption\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMgFileVideosTable extends Migration
{
    public function up()
    {
        Schema::create('mg_file_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disk_name');
            $table->string('file_name');
            $table->integer('file_size');
            $table->string('content_type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('field')->nullable();
            $table->integer('attachment_id')->nullable();
            $table->string('attachment_type')->nullable();
            $table->boolean('is_public')->default(true);
            $table->integer('sort_order')->nullable();
            $table->timestamps();

            $table->index(['attachment_type', 'attachment_id', 'field'], 'system_files_master_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mg_file_videos');
    }
}
