<?php 

class Home extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('Homemodel');//DI - подключение модели в класс контроллера  объекта модели Homemodel
		$this->load->library('table');
		$this->load->library('form_validation');
	}
	function index(){
		$this->load->view('register');
	}

	function LogIn(){
		$this->form_validation->set_rules('login','Login','trim|htmlspecialchars|required');
		$this->form_validation->set_rules('pass','Password','trim|htmlspecialchars|required');
		if($this->form_validation->run()==false){
			$this->load->view('register');
		}
		else{
			$login = $this->input->post('login');
	 		$pass = $this->input->post('pass');
	 		if($this->Homemodel->login($login,$pass)){
	 			$this->load->view('main');
	 			return;
	 		}
		}

	}

	function addLibrarian(){
		$this->form_validation->set_rules('fname','имя пользователя','trim|htmlspecialchars|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('lname','фамилия пользователя','trim|htmlspecialchars|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('email','почта','trim|htmlspecialchars|required|valid_email|is_unique[reader.email]');
		if($this->form_validation->run()==false){
			$this->load->view('addlibrarian');
		}
		else{
			$this->load->view('addlibrarian');
			if($this->input->post('add')){
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$email = $this->input->post('email');
				$pass = md5('123456');
				$this->Homemodel->addLib($fname,$lname,$email,$pass);
				$this->load->view('add_success');
			}
		}
	}

	function addCategory(){
		$this->form_validation->set_rules('category','Катеория','trim|htmlspecialchars|required');
		if($this->form_validation->run()==false){
			$res = $this->Homemodel->showCat();
			$data['cat'] = $res->result_array();
			$this->load->view('addcategory',$data);
		}
		else{
			$res = $this->Homemodel->showCat();
			$data['cat'] = $res->result_array();
			$this->load->view('addcategory',$data);
			if($this->input->post('add')){
				$category = $this->input->post('category');
				$this->Homemodel->addCat($category);
				$this->load->view('cat_success');
			}
		}

	}

	function addBook(){
		$this->form_validation->set_rules('title','Название книги','trim|htmlspecialchars|required');
		$this->form_validation->set_rules('price','Цена','trim|htmlspecialchars|required');
		$this->form_validation->set_rules('author','Автор','trim|htmlspecialchars|required');
		$this->form_validation->set_rules('pic','Фото','trim|htmlspecialchars');
		$config['upload_path'] = "./images";
		$config['allowed_types'] = "jpg|png|jpeg";
		$config['max_size'] = "1024*1024*10";
		$config['max_width'] = "1024";
		$config['max_height'] = "1024";
		$this->load->library('upload',$config);

		if($this->form_validation->run()==false){
			$this->load->view('addbooks');
		}
		else{
			$this->load->view('addbooks');
			if($this->input->post('add')){
				$title = $this->input->post('title');
				$price = $this->input->post('price');
				$authorid = $this->input->post('author');
				$categoryid = $this->input->post('category');
				if($this->upload->do_upload('pic')){
					$pic = array('upload_data'=>$this->upload->data());
					$data['image'] = $pic['upload_data']['orig_name'];
					$this->Homemodel->addBook($title,$price,$authorid,$categoryid,$data['image']);
				}
			}
		}
	}


	function addAuthor(){
		$this->form_validation->set_rules('fname','имя автора','trim|htmlspecialchars|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('lname','фамилия автора','trim|htmlspecialchars|required|min_length[2]|max_length[30]');

		if($this->form_validation->run()==false){
			$this->load->view('addauthor');
		}
		else{
			$this->load->view('addauthor');
			if($this->input->post('add')){
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$this->Homemodel->addAuthor($fname,$lname);
				$this->load->view('success');
			}
		}
	}











}









 ?>