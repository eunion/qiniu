<?php namespace Eunion\QiniuStorage;

use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Eunion\QiniuStorage\Plugins\DownloadUrl;
use Eunion\QiniuStorage\Plugins\ImageExif;
use Eunion\QiniuStorage\Plugins\ImageInfo;
use Eunion\QiniuStorage\Plugins\ImagePreviewUrl;
use Eunion\QiniuStorage\Plugins\PersistentFop;
use Eunion\QiniuStorage\Plugins\PersistentStatus;
use Eunion\QiniuStorage\Plugins\PrivateDownloadUrl;
use Eunion\QiniuStorage\Plugins\UploadToken;
use Eunion\QiniuStorage\Plugins\Fetch;
use Eunion\QiniuStorage\Plugins\PutFile;

/**
 * Class QiniuFilesystemServiceProvider
 * @package Eunion\QiniuStorage
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
