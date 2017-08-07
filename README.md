# testFrame
学习MVC模式的过程中，写了一个简单的框架。并且用这个框架实现了一个简单的留言板。

首先是框架的目录结构
│  index.php            框架入口文件
├─app                   application目录
│  ├─controller      
│  ├─model      
│  └─view
├─core                  核心文件目录
│  │  keyfile.php
│  ├─common             公共文件目录
│  ├─config             配置文件目录
│  └─libs               库文件目录
│      │  config.php
│      │  log.php
│      │  route.php  
│      └─drivers        驱动文件目录
│          └─log                 
├─log                   日志目录
└─vendor                composer目录

可以明显看出框架的MVC模式。因为用composer添加了几个模块，因此生成了vendor目录。目录中没有列出了composer的相关文件，有需要可以自行添加。

## 入口文件(index.php)
    1. 定义常量
    2. 加载函数库
    3. 启动框架

## 核心文件(keyfile.php)
    1.  自动加载类库
    2.  加载route类库，解析url
    3.  定义给视图传递内容的函数

## config目录
    配置文件。已定义了连接mysql、日志生成方法、默认url访问这三类。

## libs目录
    1.  config.php定义函数，获取配置
    2.  log.php定义函数，生成日志
    3.  route.php解析url，接收参数

## drivers目录
    暂时只添加了生成日志文件的功能。

源码中实现了一个简单的留言板。留言会在首页展示，添加留言会在数据库中生成，并在首页展示；删除留言会在数据库中删除，首页同步删除。如果想测试请自行更改数据库配置的相关文件。
框架集成了twig模板引擎，medoo数据库框架，PDO操作数据库的一些函数（注释掉了）。 
其中还有一些用于测试的输出，已注释。
第一次写东西，各位大佬轻虐。
 
