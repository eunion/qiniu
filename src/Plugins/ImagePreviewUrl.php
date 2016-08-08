<?php
/**
 * Created by PhpStorm.
 * User: Kify
 * Date: 2016/08/08
 * Time: 16:38
 */

namespace eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * Class PrivateDownloadUrl
 * 查看图像EXIF <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->imagePreviewUrl('foo/bar1.css',$ops); <br>
 *
 * @package eunion\QiniuStorage\Plugins
 */
class ImagePreviewUrl extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'imagePreviewUrl';
    }

    public function handle($path = null, $ops = null)
    {
        return $this->filesystem->getAdapter()->imagePreviewUrl($path, $ops);
    }
}