<?php

abstract class DB {
	
	//连接服务器
	public abstract function connect($host, $username, $password);

	//发送查询
	public abstract function query($sql);

	//查询多行数据
	public abstract function getAll($sql);

	//查询单行数据
	public abstract function getRow($sql);

	//查询单个数据
	public abstract function getOne($sql);

	/*
	 *自动执行insert和update
	 *autoExcute('user', array('username'=>'zhangshan', 'email'='yanshiba@163.com'), 'insert');
	 */
	public abstract function autoExcute($table, $data, $act='insert', $where='');

}