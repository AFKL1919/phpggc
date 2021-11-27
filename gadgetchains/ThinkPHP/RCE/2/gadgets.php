<?php
namespace think;
use think\model\Pivot;
abstract class Model{
	private $lazySave = false;	# save()
	private $exists = false;	# updateData()
	protected $connection;
	protected $name;			# __toString() Conversion.php =>Pivot
	private $withAttr = [];		# assert
	protected $hidden = [];
	private $data = [];
	protected $withEvent = false;
	private $force = false;
	protected $field = [];
	protected $schema = [];

	function __construct($func, $val){
		$this->lazySave = true;
		$this->exists = true;
		$this->withEvent = false;
		$this->force = true;
		$this->connection = "mysql";
		$this->withAttr = ["test"=>$func];
		$this->data = ["test"=>$val];
		$this->hidden = ["test"=>"123"];
		
		$this->field = [];
		$this->schema = [];
	}
}
namespace think\model;
use think\Model;
# Model 是一个抽象类，我们找到它的继承类，此处选取的是 Pivot 类
class Pivot extends Model{
	function __construct($obj="", $func, $val){
		parent::__construct($func, $val);
		$this->name = $obj;		# $this->name放子类构造方法中赋值，直接放基类属性中初始化不成功
	}
}