##Lapi 

A product api developed with Laravel 5.6 and Dingo/api 
Lapi是一个简单的产品api，用Laravel 5.6 和 Dingo/api搭建的，感兴趣的朋友可以一起来学习测试创建api

## 安装方法 Installation

- 1 克隆项目
composer create-project --prefer-dist ytkah/Lapi 
或者 git clone https://github.com/ytkah/Lapi.git 
注意：storage 和 bootstrap/cache 权限改为 777

- 2 复制.env.example为.env并修改数据库配置文件

- 3 安装 
composer install

- 4 生成key 
php artisan key:generate

- 5 迁移数据表 
php artisan migrate

- 6 填充一些数据 
php artisan db:seed


## 安装步骤可参考
https://www.cnblogs.com/ytkah/p/9284421.html

http://www.cnblogs.com/ytkah/tag/laravel/

