根据ip获取对应的城市名称 Extension for Yii2
=================

根据ip获取对应的城市名称 qqwry QQWry

[![Latest Stable Version](https://poser.pugx.org/juckzhang/yii2-ip-look-up/version)](https://packagist.org/packages/juckzhang/yii2-ip-look-up)
[![Total Downloads](https://poser.pugx.org/juckzhang/yii2-ip-look-up/downloads)](https://packagist.org/packages/juckzhang/yii2-ip-look-up)
[![License](https://poser.pugx.org/juckzhang/yii2-ip-look-up/license)](https://packagist.org/packages/juckzhang/yii2-ip-look-up)

Installation
--------------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require juckzhang/yii2-ip-look-up:*
```

or add

```json
"juckzhang/yii2-ip-look-up": "*"
```

to the `require` section of your composer.json.


Configuration
--------------------

To use this extension, simply add the following code in your application configuration:

#### [配置]
```php
/** QiNiu **/
return [
    'components' => [
      'ipLookUp' => [
          'class' => 'juckzhang\ipLookUp\IpLookUp',
          'file'  => 'qqwry.dat'//纯真ip库文件地址
    ],
]
```

#### [使用]
```php
1、更新纯真ip库文件
\Yii::$app->get('ipLookUp')->updateQqWryFile();

2、根据ip返回城市信息
\Yii::$app->get('ipLookUp')->ipLookUp($ip);
```

Tricks
--------------------

* 给配置的组件加 IDE 自动补全 [IDE autocompletion for custom components](https://github.com/samdark/yii2-cookbook/blob/master/book/ide-autocompletion.md)
