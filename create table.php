<?php
//index.php
/*------------To create table SECURITY------------*/
	$query="create table security (id int(3),temp_id int(3),admin_page varchar(30),admin_sub_page int(2),admin_right int(2),username varchar(50) PRIMARY KEY,password varchar(50))";
	$result = mysql_query($query,$db);
	
	/*---------To create table VIEWS----------*/
	$sql= "create table views (id int(1),views int(10))";
	$result = mysql_query($sql,$db);

//admin_ward.php
	/*------------To create table PRAYER MEETING------------*/
	$sql = "create table prayer_meeting(page varchar(30),sub_page int(2),temp_id int(2),date varchar(25),time varchar(10),name varchar(30),address text,information text)";
	$result=mysql_query($sql,$db);
	/*----------To create table WARD INFO--------------*/
	$sql= "create table ward_info(page varchar(30),sub_page int(2),temp_id int(2),about text,location text,nof int(3))";
	$result=mysql_query($sql,$db);
//admin_home.php
	/*------------To create table LATEST NEWS------------*/
	$query="create table latest_news(page varchar(30),file_id int(2),temp_id int(2),file_name varchar(30),
	file_desc varchar(100),visible int(1),new_file int(1),file_type varchar(5))";
	$result = mysql_query($query,$db);
	
	/*------------To create table PAGE CONTENT------------*/
	$sql="CREATE TABLE page_content (page varchar(30),sub_page int(2),sub_no int(2),temp_id int(2),sub_title varchar(50),sub_content text)";
	$result=mysql_query($sql,$db);
	
	/*------------To create table CONTACT------------*/
	$query="CREATE table contact(page varchar(30),position int(2),post varchar(30),name varchar(35),
	address text,phone varchar(10),landline int(7),email varchar(30))";
	$result = mysql_query($query,$db);
	
	
	/*------------To create table COUNCIL MEMBERS------------*/
	$query="create table council_members (page varchar(30),sub_page int(2), temp_id int(2),
	position int(2), post varchar(30),name varchar(30),address text,phone varchar(10),landline varchar(7),image varchar(100))";
	$result = mysql_query($query,$db);
	
	/*---------To create table ALBUMS----------*/
	$sql="CREATE table albums(name varchar(100),page_name varchar(50),page varchar(30),sub_page int(3),temp_id int(3))";
	$result = mysql_query($sql,$db);
//admin_header.php
	/*-----------To create WARDS_TABLE-------------*/
	$sql= "CREATE TABLE wards_table(id int(2),temp_id int(2),name varchar(30),image varchar(100))";
	$result=mysql_query($sql,$db);
	
	/*-----------To create ASSOCIATIONS_TABLE-------------*/
	$sql= "CREATE TABLE associations_table(id int(2),temp_id int(2),name varchar(30),image varchar(100))";
	$result=mysql_query($sql,$db);
	
	/*----CREATE TABLE parishes_table------*/
		$sql="CREATE TABLE parishes_table(page varchar(10),id int(2) PRIMARY KEY,name varchar(50),landline varchar(8),address text,
		p_name varchar(50),ap_name varchar(50),p_phone varchar(10),ap_phone varchar(10),image varchar(50))";
		$result = mysql_query($sql,$db);
	
	/*----------To create table SERVICE TABLE--------------*/
	$sql = "create table service_table(sid int(2),tempid int(2),page varchar(30),name varchar(30),email varchar(30),subject varchar(100),detail text)";
	$result=mysql_query($sql,$db);
?>