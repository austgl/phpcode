<?php
require('upyun.class.php');
$upyun = new UpYun("new100", "haowubai2", "php100.com");

print('SDK 版本 '.$upyun->version()."\n");
$upyun->debug = true;

/// 切换 API 接口的域名
/// {默认 v0.api.upyun.com 自动识别, v1.api.upyun.com 电信, v2.api.upyun.com 联通, v3.api.upyun.com 移动}
// $upyun->setApiDomain('v0.api.upyun.com');



/// 获取空间占用大小
//var_dump($upyun->getBucketUsage());



/// 获取某个目录的空间占用大小
// var_dump($upyun->getFolderUsage("/test/")); // 必须斜杠结尾




/// 上传文件
// var_dump($upyun->writeFile("/test.txt", "test test"));
// 上传文件时可使用 $upyun->writeFile("/a/b/c/test.txt", "test test", true) 进行父级目录的自动创建（最深10级目录）


/// 设置待上传文件的 Content-MD5 值（如又拍云服务端收到的文件MD5值与用户设置的不一致，将回报 406 Not Acceptable 错误）
//$upyun->setContentMD5(md5_file('/tmp/test.jpg'));

/// 设置待上传文件的 访问密钥（注意：仅支持图片空！，设置密钥后，无法根据原文件URL直接访问，需带 URL 后面加上 （缩略图间隔标志符+密钥） 进行访问）
/// 如缩略图间隔标志符为 ! ，密钥为 bac，上传文件路径为 /folder/test.jpg ，那么该图片的对外访问地址为： http://空间域名/folder/test.jpg!bac
//$upyun->setFileSecret('bac');


// 采用数据流模式上传文件（可节省内存）
//$fh = fopen('12.png','r'); 
//$upyun->writeFile("/12.png", $fh);  //返回一个布尔值
//fclose($fh);

/// 获取上传后的图片信息（仅图片空间有返回数据）
// var_dump($upyun->getWritedFileInfo('x-upyun-width')); // 图片宽度
// var_dump($upyun->getWritedFileInfo('x-upyun-height')); // 图片高度
// var_dump($upyun->getWritedFileInfo('x-upyun-frames')); // 图片帧数
// var_dump($upyun->getWritedFileInfo('x-upyun-file-type')); // 图片类型




/// 读取文件
// var_dump($upyun->readFile("/test.txt"));
// 采用数据流模式下载文件（可节省内存）
// $fh = fopen('/tmp/test.jpg','w'); var_dump($upyun->readFile("/test.jpg", $fh)); fclose($fh);

/// 获取文件信息 return array('type'=> file | folder, 'size'=> file size, 'date'=> unix time) 或 null
// var_dump($upyun->getFileInfo('/test.txt'));



/// 删除文件
// var_dump($upyun->deleteFile("/test.txt"));



/// 创建目录
// var_dump($upyun->mkDir('/A'));
$upyun->mkDir("/a/b/c", true);



/// 删除目录（目录必须为空）
// var_dump($upyun->rmDir('/A'));



/// 读取目录
print_r($upyun->readDir('/ccc'));
// var_dump($upyun->readDir('/folder/')); // 必须斜杠结尾