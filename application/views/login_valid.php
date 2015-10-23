<?php
if(isset($redirect_url))
 $json= array(
       'login_status' => 'success',
       'redirect_url'=>$redirect_url);
else
	$json= array(
       'login_status' => 'success');
 echo json_encode($json);
?>