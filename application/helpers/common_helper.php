<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function redirct_re(){
        $re_url = $_SERVER['HTTP_REFERER'];
        echo $re_url;
    }
    function get_post($param_name=NULL){
    	$CI =& get_instance();
        return $CI->input->post($param_name, TRUE);
    }
    function get_get($param_name=NULL){
        $CI =& get_instance();
        $get_param = $CI->input->get($param_name, TRUE);
        return $get_param;
    }
    function get_rand_num_array($count) {
    	$result = array();
		while(count($result)< $count) {  
        	$result[] = mt_rand(0, $count-1); //mt_rand()是比rand()更好更快的随机函数  
        	$result = array_unique($result); //删除数组中重复的元素  
    	}  
    	return $result;  
	}


    function export_csv($filename,$data) { 
        header("Content-type:text/csv"); 
        header("Content-Disposition:attachment;filename=".$filename); 
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0'); 
        header('Expires:0'); 
        header('Pragma:public'); 
        echo $data; 
    } 