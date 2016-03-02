<?php 
$this->load->view('header');

echo validation_errors();
echo form_open('home/LogIn','class=forma');
echo '<div class="form-group">';
echo form_label('Login', 'login');
echo form_input(array('name'=>'login','size'=>'50','class'=>'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Password', 'pass');
echo form_password(array('name'=>'pass','size'=>'50','id'=>'pass','class'=>'form-control','onblur'=>'checkpass()'));
echo '</div>';
echo form_submit('add','Enter', 'class="btn btn-warning"');
echo '</div>';
echo form_close();

$this->load->view('footer');
?>
