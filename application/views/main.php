<?php 
$this->load->view('header');
echo '<nav class="menu">
		<div class="row">
 			<div class="col-xs-12 col-md-8">';
echo anchor('home/addLibrarian','Добавить библиотекаря','class="btn btn-warning"');
echo anchor('home/addBook','Добавление книг', 'class="btn btn-warning"');
echo anchor('home/addCategory','Добавление категории','class="btn btn-warning"');


echo '</div></nav>';







$this->load->view('footer');
?>
