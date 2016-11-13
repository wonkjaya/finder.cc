<?php

function form_dropdown_level($config,$default='03'){
	$config['class']='form-control';
	$data=['03'=>'Pedagang','02'=>'Pengguna','01'=>'Editor','00'=>'Administrator'];
	return form_dropdown('level',$data, $default, $config );
}


?>