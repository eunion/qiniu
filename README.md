Laravel5 七牛存储组件（使用官方SDK）

这个包依赖七牛官方 PHP-SDK ，使其符合 Laravel 中操作文件的规范，因此可高度信赖。

注意

由于七牛并不支持所谓的目录，不存在树形结构，因为目录操作基本可以无视。

建议只是用来上传、更新资源就好了，不要做列表展示！

安装

composer require eunion/laravel-storage-qiniu
config/app.php 里面的 providers 数组， 加上一行 Eunion\QiniuStorage\QiniuFilesystemServiceProvider
config/filesystem.php 里面的 disks数组加上：

    'disks' => [

        'qiniu' => [
            'driver' => 'qiniu',
            'domain' => '',   								//你的七牛域名
            'access_key'    => '',                          //AccessKey
            'secret_key' => '',                             //SecretKey
            'bucket' => '',                                 //Bucket名字
        ],
    ],
使用

    $disk = \Storage::disk('qiniu');
    $disk->exists('file.jpg');                      //文件是否存在
    $disk->get('file.jpg');                         //获取文件内容
    $disk->put('file.jpg',$contents);               //上传文件，$contents 二进制文件流
    $disk->prepend('file.log', 'Prepended Text');   //附加内容到文件开头
    $disk->append('file.log', 'Appended Text');     //附加内容到文件结尾
    $disk->delete('file.jpg');                      //删除文件
    $disk->delete(['file1.jpg', 'file2.jpg']);
    $disk->copy('old/file1.jpg', 'new/file1.jpg');  //复制文件到新的路径
    $disk->move('old/file1.jpg', 'new/file1.jpg');  //移动文件到新的路径
    $size = $disk->size('file1.jpg');               //取得文件大小
    $time = $disk->lastModified('file1.jpg');       //取得最近修改时间 (UNIX)
    $files = $disk->files($directory);              //取得目录下所有文件
    $files = $disk->allFiles($directory);               //取得目录下所有文件，包括子目录

	$token = QiniuStorage::disk('空间名')->uploadToken(
	null,		//key
	3600,		//expired time
	array(
		'callbackUrl'=>$callback,
		'callbackBody'=>json_encode(array(
			'name'=>$request->filename,
			'path'=>$path,
			'size'=>'$(fsize)',
			'hash'=>'$(etag)',
			'type'=>'$(mineType)'
		)),
		'callbackBodyType'=>'application/json'
	));