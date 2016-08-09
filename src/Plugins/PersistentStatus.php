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
 * 查看图像EXIF <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->persistentStatus('foo/bar1.css'); <br>
 *
 * @package Eunion\QiniuStorage\Plugins
 */
class PersistentStatus extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'persistentStatus';
    }

    public function handle($id)
    {
        return $this->filesystem->getAdapter()->persistentStatus($id);
    }
}