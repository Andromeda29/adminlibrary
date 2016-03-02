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

echo '<div class="row"><div class="col-md-2">';
echo '<h3>Список категорий</h3>';
echo '<ol>';
foreach($cat as $v){

	echo '<li>'.$v['categoryname'].'</li>';
}
echo '</ol></div>';
echo '<div class="col-md-10">';
echo validation_errors();
echo form_open('home/addCategory','class=forma');
echo '<div class="form-group">';
echo form_label('Категория', 'category');
echo form_input(array('name'=>'category','size'=>'50','class'=>'form-control','value'=>set_value('category')));
echo '<div class="form-group">';
echo form_submit('add','Добавить', 'class="btn btn-warning"');
echo '</div>';
echo form_close();

echo '</div></div>';
$this->load->view('footer');
?>
