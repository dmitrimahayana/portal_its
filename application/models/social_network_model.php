<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Social_network_model extends Base_image_model {	function __construct()    {        // Call the Model constructor        parent::__construct();		$this->table_name = "social_network";		$this->primary_key = "id_social_network";		$this->unique_key = "name";		$this->image_column = "icon";    }		function get_post_data()	{		$icon = $_POST['icon'];		if($icon==0) { $icon = null; }		if($_POST['online'] == null) {$_POST['online'] = 0;}		$insert = array(		    'name' => $_POST['name'],			'link' => $_POST['link'],			'icon' => $icon,			'order' => $_POST['order'],			'online' => $_POST['online']		);		return $insert;	}		function add()	{		$insert = $this->get_post_data();		return parent::add($insert);	}		function edit()	{		$insert = $this->get_post_data();		return parent::edit($insert);	}}/* End of Social Network Model *//* 26 Juli 2012 [12:13 PM] */?>