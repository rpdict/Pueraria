# **Pueraria **

* * *
**Pueraria** 是一款基于Laravel5.4封装的后台管理系统，视图使用[AdminLTE](https://github.com/almasaeed2010/AdminLTE)，集成了[Entrust](https://github.com/Zizaco/entrust)权限管理，并针对业务的增删改查进行了视图和业务层的封装。
![](http://wx2.sinaimg.cn/mw690/005w1SFgly1ffagv63ab9j313l0lhn3d.jpg)

## Getting started

* * *

```
$ composer install
$ composer dump-autoload
$ php artisan migrate --force
$ php artisan key:generate
$ npm install
$ npm run dev
```

## Other

* * *
可能要在roles表里添加”admin”项，在permissions表里添加”admin”项，再在各自的关联表里关联一下。。再把当前的用户加进去。。。好了，这下就能体验管理员用户的功能了
