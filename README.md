# BitMap
位图

### 安装
`composer require verdient/bitmap`

### 创建新的位图
```php
use Verdient\BitMap\BitMap;

/**
 * @var int 位图大小
 */
$size = 1024;

$bitMap = new BitMap([
	'size' => $size
]);

```

### 设置指定的位
```php
/**
 * 偏移量
 */
$offset = 0;

/**
  * 值，默认为1，可选1和0
  */
$value = 0;

$bitMap->set($offset, $value);
```

### 获取指定的位
```php
/**
 * 偏移量
 */
$offset = 0;

$bitMap->get($offset);

```
### 获取位图的大小
```php
$bitMap->getSize();
```
