<?php namespace MG\FileUploader\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddVideoToSystemFilesTable extends Migration
{
    public function up()
    {
        Schema::table( 'system_files', function ( Blueprint $table ) {
            $table->integer('video')->nullable();
        } );
    }

    public function down()
    {
        Schema::table( 'system_files', function ( Blueprint $table ) {
            $table->dropColumn('video');
        });

    }
}
