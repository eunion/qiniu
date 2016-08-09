<?php
/**
 * Created by PhpStorm.
 * User: Kify
 * Date: 2016/08/08
 * Time: 16:22
 */

namespace Eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * Class PrivateDownloadUrl
 * 查看图像EXIF <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->imageExif('foo/bar1.css'); <br>
 *
 * @package Eunion\QiniuStorage\Plugins
 */
class ImageExif extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'imageExif';
    }

    public function handle($path = null)
    {
        return $this->filesystem->getAdapter()->imageExif($path);
    }
}