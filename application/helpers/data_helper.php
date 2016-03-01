<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    function all_or_like($db_instance, $columns_array, $like_str){
        foreach ($columns_array as $col) {
            $db_instance->db->or_like($col, $like_str); 
        }
    }