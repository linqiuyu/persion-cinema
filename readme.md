使用laravel6.0搭建的个人影院，只适配手机端

### 后端
php7.0及以上   
laravel6.0

### 前端
weui

### 安装
复制 .env.example 到 .env   
安装依赖```composer install```   
生成APP_KEY```php artisan key:generate```   

视频和图片使用七牛云的对象存储，配置在config/filesystems.php
```
'qiniu' => [
    'access_key' => env('QINIU_ACCESS_KEY', ''), // access key
    'secret_key' => env('QINIU_SECRET_KEY', ''), // secret key
    'bucket' => env('QINIU_BUCKET', ''), // 存储空间名
    'domain' => 'qdy.wangyouquan.cc', // 绑定的域名
    'protocol' => 'http', // 协议
    'maximum' => 6, // 最大视频数量　
],
```
七牛云有免费的10G空间，当视频最大数量超过配置时会删除最早上传的视频，0为不限制数量   
最后运行```php artisan serve```访问```localhost:8000```查看站点
