<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function make_pageination($site_url, $element_id, $count, $per_page=30){
    	$CI =& get_instance();
    	$CI->load->library('pagination');
    	$CI->load->helper('common_helper');
	    $config['base_url'] = site_url($site_url);
	    $config['total_rows'] = $count;
	    $config['per_page'] = $per_page;
	    $config['uri_segment'] = 3;
	    $config['full_tag_open'] = '<p class="pageination" id="'.$element_id.'">';
	    $config['full_tag_close'] = '(共'.$count.'条)</p>';
	    $config['first_link'] = '第一页';
	    $config['last_link'] = '最后一页';
	    if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query(get_get());
	    if (count($_GET) > 0) $config['first_url'] = $config['base_url'].'?'.http_build_query(get_get());
	    if (count($_GET) > 0) $config['last_url'] = $config['base_url'].'?'.http_build_query(get_get());
	    $CI->pagination->initialize($config);
    }