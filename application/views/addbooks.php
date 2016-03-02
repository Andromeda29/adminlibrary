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


echo'<div class="container">
			<div class="row">
 				<div class="col-xs-12 col-md-6">';
echo validation_errors();
echo form_open_multipart('home/addBook','class=forma');

echo '<div class="form-group">';
echo form_label('Название книги', 'title');
echo form_input(array('name'=>'title','size'=>'50','class'=>'form-control','value'=>set_value('title')));
echo '</div>';

echo '<div class="form-group">';
echo form_label('Цена', 'price');
echo form_input(array('name'=>'price','size'=>'50','class'=>'form-control','value'=>set_value('price')));
echo '</div>';

echo '<div class="form-group">';
echo form_label('Автор', 'author');
	$sel = 'select * from author';
	$res = mysql_query($sel);
	$option = array("0"=>"--Выберите автора--");
	while($row = mysql_fetch_array($res,MYSQL_NUM))
	{
	$option[$row[0]]=$row[1]." ".$row[2];
	}
echo form_dropdown('author',$option,'0','class=form-control').'<br/>';

echo '</div>';

echo '<div class="form-group">';
echo form_label('Обложка', 'pic');
echo form_upload(array('name'=>'pic', 'class=form-control'));
echo '</div>';

echo '<div class="form-group">';
echo form_label('Категория', 'category');
	$sel = 'select * from category';
	$res = mysql_query($sel);
	$option = array("0"=>"--Выберите категорию--");
	while($row = mysql_fetch_array($res,MYSQL_NUM))
	{
	$option[$row[0]]=$row[1];
	}
echo form_dropdown('category',$option,'0','class=form-control').'<br/>';

echo '</div>';

echo '<div class="form-group">';
echo form_submit('add','Добавить', 'class="btn btn-warning"');
echo '</div>';
echo form_close();
echo'</div>
			</div>
	</div>';

$this->load->view('footer');
?>