<?php 

class Homemodel extends CI_Model{
	function __construct(){
		parent:: __construct();
	}
	function login($login,$pass){
		$this->db->select('pass');
		$this->db->where('login',$login);
		$res = $this->db->get('user');
		$row = $res->result_array();
		if(!$row) return false;
		if($row[0]['pass']==$pass) return true;
		else return false;

	}
	function addLib($fname,$lname,$email,$pass){
		$data = array('fname'=>$fname,'lname'=>$lname,'email'=>$email,'pass'=>$pass);
		$this->db->insert('Librarian',$data);
	}

	function addCat($cat){
		$data = array('categoryname'=>$cat);
		$this->db->insert('category',$data);
	}
	function showCat(){
		$res = $this->db->get('category');
		return $res;
	}

	function addBook($title,$price,$authorid,$categoryid,$pic){
		$data = array('title'=>$title,'price'=>$price,'authorid'=>$authorid,'categoryid'=>$categoryid,'cover'=>$pic);
		$this->db->insert('book',$data);
	}

	function addAuthor($fname,$lname){
		$data = array('fname'=>$fname,'lname'=>$lname);
		$this->db->insert('author',$data);
	}







}







 ?>