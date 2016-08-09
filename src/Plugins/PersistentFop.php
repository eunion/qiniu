<?php
/**
 * Created by PhpStorm.
 * User: Kify
 * Date: 2016/08/08
 * Time: 19:42
 */

namespace Eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * Class PrivateDownloadUrl
 * 查看图像EXIF <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->persistentFop('foo/bar1.css'); <br>
 *
 * @package Eunion\QiniuStorage\Plugins
 */
class PersistentFop extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'persistentFop';
    }

    public function handle($path = null, $fops = null)
    {
        return $this->filesystem->getAdapter()->persistentFop($path, $fops);
    }
}