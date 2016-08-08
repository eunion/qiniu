<?php
/**
 * Created by PhpStorm.
 * User: Kify
 * Date: 2016/08/08
 * Time: 18:42
 */

namespace eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * Class PrivateDownloadUrl
 * 得到私有资源下载地址 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->privateDownloadUrl('foo/bar1.css'); <br>
 *
 * @package eunion\QiniuStorage\Plugins
 */
class PrivateDownloadUrl extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'privateDownloadUrl';
    }

    public function handle($path = null, $expires = 3600)
    {
        $adapter = $this->filesystem->getAdapter();

        return $adapter->privateDownloadUrl($path, $expires);
    }
}