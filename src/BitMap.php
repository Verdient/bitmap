<?php
namespace Verdient\BitMap;

/**
 * 位图
 * @author Verdient。
 */
class BitMap extends \chorus\BaseObject
{
	/**
	 * @var int 大小
	 * @author Verdient。
	 */
	protected $size = 0;

	/**
	 * @var string $data 数据
	 * @author Verdient。
	 */
	protected $_data = '';

	/**
	 * 设置位
	 * @param int $offset 偏移量
	 * @param int $value 值
	 * @return bool
	 * @author Verdient。
	 */
	public function set($offset, $value = 1){
		if($this->size && $offset >= $this->size){
			return false;
		}
		$o = $offset % 8;
		$i = intval(($offset - $o) / 8);
		$n = strlen($this->_data);
		if($n <= $i){
			$this->_data .= str_repeat(chr(0), $i - $n + 1);
		}
		if($value){
			$this->_data[$i] = chr(ord($this->_data[$i]) | (1 << 7 - $o));
		}else{
			$this->_data[$i] = chr(ord($this->_data[$i]) & (255 - (1 << 7 - $o)));
		}
		return true;
	}

	/**
	 * 获取
	 * @return int|false
	 * @author Verdient。
	 */
	public function get($offset){
		if($this->size && $offset >= $this->size){
			return false;
		}
		$o = $offset % 8;
		$i = intval(($offset - $o) / 8);
		if(!isset($this->_data[$i])){
			return 0;
		}
		if((ord($this->_data[$i]) >> 7 - $o & 1) ^ 1){
			return 0;
		}
		return 1;
	}

	/**
	 * 获取位图大小
	 * @return int
	 * @author Verdient。
	 */
	public function getSize(){
		return $this->size;
	}
}