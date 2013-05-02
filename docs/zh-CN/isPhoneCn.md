[isPhoneCn()](http://twinh.github.io/widget/api/isPhoneCn)
==========================================================

检查数据是否为有效的电话号码

### 
```php
bool isPhoneCn( $input )
```

##### 参数
* **$input** `mixed` 待验证的数据


##### 错误信息
| **名称**              | **信息**                                                       | 
|-----------------------|----------------------------------------------------------------|
| `pattern`             | %name%必须是有效的电话号码                                     |
| `negative`            | %name%不能是电话号码                                           |
| `notString`           | %name%必须是字符串                                             |


##### 代码范例
检查"020-1234567"是否为电话号码
```php
<?php
 
if ($widget->isPhoneCn('020-1234567')) {
    echo 'Yes';
} else {
    echo 'No';
}
```
##### 运行结果
```php
'Yes'
```