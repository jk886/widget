[isAlpha()](http://twinh.github.io/widget/api/isAlpha)
======================================================

检查数据是否只由字母(a-z)组成

### 
```php
bool isAlpha( $input )
```

##### 参数
* **$input** `mixed` 待验证的数据

##### 错误信息
| **名称**              | **信息**                                                       | 
|-----------------------|----------------------------------------------------------------|
| `pattern`             | %name%只能由字母(a-z)组成                                      |
| `negative`            | %name%必须不匹配模式"%pattern%"                                |
| `notString`           | %name%必须是字符串                                             |

##### 代码范例
检查数据是否只由字母组成
```php
<?php

$input = 'abc123';
if ($widget->isAlpha($input)) {
    echo 'Yes';
} else {
    echo 'No';
}
```
##### 运行结果
```php
'No'
```