<?php 
$this->load->view('header');
echo '<nav class="menu">
		<div class="row">
 			<div class="col-xs-12 col-md-8">';
echo anchor('home/addLibrarian','Добавить библиотекаря','class="btn btn-warning"');
echo anchor('home/addAuthor','Добавление автора','class="btn btn-warning"');
echo anchor('home/addCategory','Добавление категории','class="btn btn-warning"');
echo anchor('home/addBook','Добавление книг', 'class="btn btn-warning"');
echo '</div></nav>';


echo validation_errors();
echo form_open('home/addAuthor','class=forma');
echo '<div class="form-group">';
echo form_label('Имя автора', 'fname');
echo form_input(array('name'=>'fname','size'=>'50','class'=>'form-control','value'=>set_value('fname')));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Фамилия автора', 'lname');
echo form_input(array('name'=>'lname','size'=>'50','class'=>'form-control','value'=>set_value('lname')));
echo '</div>';
echo '<div class="form-group">';
echo '<div class="form-group">';
echo form_submit('add','Добавить', 'class="btn btn-warning"');
echo '</div>';
echo form_close();








$this->load->view('footer');
 ?>