<?php namespace MG\FileUploader\Models;

use System\Models\File;

class FileVideo extends File
{

    public $table = 'mg_file_videos';

    public $belongsTo = [
       'file' => File::class
    ];
}
