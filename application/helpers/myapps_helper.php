<?php 

function success_msg($msg)
{
	return '<div class="alert alert-success" role="alert">
			  <b>SUKSES! </b>'.$msg.
			'</div>';
}

function error_msg($msg)
{
	return '<div class="alert alert-danger" role="alert">
			  <b>ERROR! </b>'.$msg.
			'</div>';
}