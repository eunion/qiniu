<?php

namespace Eunion\QiniuStorage\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * 从指定URL抓取资源，并将该资源存储到指定空间中。
 *
 * @author Kify <923382771@qq.com> 2016-08-08
 * @see http://developer.qiniu.com/docs/v6/api/reference/rs/fetch.html
 */
class Fetch extends AbstractPlugin
{

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'fetch';
    }

    /**
     * Fetch a file from url.
     *
     * @param string $url The specified url.
     * @param string $key The target filename.
     *
     * @return string
     */
    public function handle($key, $url = '')
    {
        return $this->filesystem->getAdapter()->fetch($key, $url);
    }
}
