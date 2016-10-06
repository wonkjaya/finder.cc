<?php

function form_dropdown_level($default='03'){
	$data=['03'=>'Pedagang','02'=>'Pengguna','01'=>'Editor','00'=>'Administrator'];
	return form_dropdown('level',$data,$default, 'class="form-control"');
}


?>