<?php
/**
 * Created by PhpStorm.
 * User: Kify
 * Date: 2016/08/08
 * Time: 18:42
 */

namespace eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;
use League\Flysystem\Config;

/**
 * Class PutFile
 * 适合上传大文件 <br>
 * $disk        = \Storage::disk('qiniu'); <br>
 * $re          = $disk->getDriver()->putFile('foo/bar1.css', '/tmp/1.txt'); <br>
 *
 * @package eunion\QiniuStorage\Plugins
 */
class PutFile extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'putFile';
    }

    public function handle($path, $filePath, array $config = [])
    {
    	$config = new Config($config);

        $result = $this->filesystem->getAdapter()->write($path, $filePath, $config, true);

        return $result;
    }
}