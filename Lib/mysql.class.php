<?php
class mysql{

	private $conn;

	//连接数据库
	public function connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME){
		$this->conn = @mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME)or die('Mysql Error');
		mysqli_query($this->conn,"SET NAMES utf8");
	}
	
	//执行SQL语句
	public function query($sql){
		return mysqli_query($this->conn,$sql);
	}
	
	//获取单条数据
	public function getOne($sql){
		$result = $this->query($sql);
		if($result){
			$data = mysqli_fetch_assoc($result);
			return $data;
		}
		return false;
	}
	
	//获取多条数据
	public function getAll($sql){
		$result = $this->query($sql);
		if($result){
			$num = mysqli_num_rows($result);
			for($i = 0;$i <= $num;$i++){
				$arr[] = mysqli_fetch_assoc($result);
			}
			array_pop($arr);
			return $arr;
		}
		return false;
	}
	
	//字符串编码
	public function deStr($str){
	if(get_magic_quotes_gpc()){
		return $str;
	}else{
		return addslashes($str);
	}
}
	
	//登录
	public function login($name,$pass){
		if(empty($name) || empty($pass)){
			return false;
		}
		$result = $this->getOne("select username,password from user where username = '".$this->deStr($name)."' and password = '".$this->deStr($pass)."'");
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	//注册
	public function register($name,$pass,$type,$sitename,$email){
		if(empty($name) || empty($pass)){
			return false;
		}
		return $this->query("insert into user(username,password,sitetype,sitename,email)values('".$this->deStr($name)."','".$this->deStr($pass)."','".$this->deStr($type)."','".$this->deStr($sitename)."','".$this->deStr($email)."')");
	}
	
	//更改密码
	public function changePass($name,$newPass,$email){
		return $this->query("update user set password = '".$this->deStr($newPass)."' where username = '".$this->deStr($name)."' & email = '".$this->deStr($email)."'");
	}
	
	//判断登录状态
	public function iCookie(){
		return $this->login(@$_COOKIE['username'],@$_COOKIE['password']);
	}
	
}