<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function get_now(){
    	$CI =& get_instance();
    	$CI->load->helper('date');
 
		return date ('Y-m-d H:i:s');
    }