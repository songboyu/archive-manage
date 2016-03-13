<?php

/**
* 类名(report_model)
*
* PHP version 5
*
* 功能描述:数据库M层，用来和数据库进行交互，负责从数据库中存取数据
*
* @package  Model
* @author   song
* @license  No licence
* @version  SVN: 1.0
* @link     about:blank
* 
*/
class report_model extends CI_Model
{
    /**
     * 引用数据库文件
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('data_helper');
    }
}
