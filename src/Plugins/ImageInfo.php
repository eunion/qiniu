<?php
/**
 * Created by PhpStorm.
 * User: Kify
 * Date: 2016/08/08
 * Time: 16:33
 */

namespace eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * Class PrivateDownloadUrl
 * 查看图像属性 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->imageInfo('foo/bar1.css'); <br>
 *
 * @package eunion\QiniuStorage\Plugins
 */
class ImageInfo extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'imageInfo';
    }

    public function handle($path = null)
    {
        return $this->filesystem->getAdapter()->imageInfo($path);
    }
}