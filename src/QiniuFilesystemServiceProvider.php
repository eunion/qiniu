<?php namespace eunion\QiniuStorage;

use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use eunion\QiniuStorage\Plugins\DownloadUrl;
use eunion\QiniuStorage\Plugins\ImageExif;
use eunion\QiniuStorage\Plugins\ImageInfo;
use eunion\QiniuStorage\Plugins\ImagePreviewUrl;
use eunion\QiniuStorage\Plugins\PersistentFop;
use eunion\QiniuStorage\Plugins\PersistentStatus;
use eunion\QiniuStorage\Plugins\PrivateDownloadUrl;
use eunion\QiniuStorage\Plugins\UploadToken;
use eunion\QiniuStorage\Plugins\Fetch;
use eunion\QiniuStorage\Plugins\PutFile;

/**
 * Class QiniuFilesystemServiceProvider
 * @package eunion\QiniuStorage
 */
class QiniuFilesystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        \Storage::extend(
            'qiniu',
            function ($app, $config) {
                $qiniu_adapter = new QiniuAdapter(
                    $config['access_key'],
                    $config['secret_key'],
                    $config['bucket'],
                    $config['domain']
                );
                $file_system = new Filesystem($qiniu_adapter);
                $file_system->addPlugin(new PrivateDownloadUrl());
                $file_system->addPlugin(new DownloadUrl());
                $file_system->addPlugin(new ImageInfo());
                $file_system->addPlugin(new ImageExif());
                $file_system->addPlugin(new ImagePreviewUrl());
                $file_system->addPlugin(new PersistentFop());
                $file_system->addPlugin(new PersistentStatus());
                $file_system->addPlugin(new UploadToken());
                $file_system->addPlugin(new Fetch());
                $file_system->addPlugin(new PutFile());

                return $file_system;
            }
        );
    }

    public function register()
    {
        //
    }
}
