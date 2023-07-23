<?php namespace MG\FileUploader;

use Backend;
use Event;
use System\Classes\PluginBase;
use System\Models\File;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'FileUploader',
            'description' => 'No description provided yet...',
            'author' => 'MG',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        // Thanks [snipi@OctoberTalk](https://talk.octobercms.com/t/extend-fileuploader-widget/1585/2?u=mmoollllee)
        File::extend(function ($model) {
            $model->attachOne['video'] = [
                File::class, 'delete' => true
            ];
        });
        
        Event::listen('backend.form.extendFields', function ($widget) {

            if (!$widget->model instanceof File) return;

            $widget->addFields([
                'video' => [
                    'label' => 'Video',
                    'type' => 'fileupload',
                    'maxFiles' => 1,
                ]
            ]);

        });
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'MG\FileUploader\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mg.fileuploader.some_permission' => [
                'tab' => 'FileUploader',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'fileuploader' => [
                'label' => 'FileUploader',
                'url' => Backend::url('mg/fileuploader/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['mg.fileuploader.*'],
                'order' => 500,
            ],
        ];
    }
}
