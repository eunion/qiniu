<?php
/**
 * Created by PhpStorm.
 * User: Kify
 * Date: 2016/08/08
 * Time: 18:42
 */

namespace Eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * Class PrivateDownloadUrl
 * 得到公有资源下载地址 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->uploadToken('foo/bar1.css'); <br>
 *
 * @package Eunion\QiniuStorage\Plugins
 */
class UploadToken extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'uploadToken';
    }

    public function handle($path = null, $expires = 3600, $policy = null, $strictPolicy = true)
    {
        return $this->filesystem->getAdapter()->uploadToken($path, $expires, $policy, $strictPolicy);
    }
}