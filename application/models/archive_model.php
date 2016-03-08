<?php

/**
* 类名(archive_model)
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
class archive_model extends CI_Model
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

    function get_archives($offset=0, $count=0, $sort_col='', $sort_type='desc', $search_str='')
    {
        //获取数据总数
        $result['total_records'] = $this->db->count_all('archive');
        //利用codeigniter的cache机制在获取数据总条数的同时，获取分页数据
        $this->db->start_cache();
        //设置查询条件
        if($sort_col != ''){
            $this->db->order_by($sort_col, $sort_type);
        }else{
            $this->db->order_by('SID', 'desc');
        }
        if($search_str != ''){
            $columns_array = array(
                1 => 'name',
                2 => 'school',
                3 => 'grade',
                4 => 'SID'
            );
            //all_or_like 在data_helper中定义，用于多列匹配
            all_or_like($this, $columns_array, $search_str);
        }
        //结束缓存
        $this->db->stop_cache();
        //获取符合条件的数据条数
        $result['display_records'] = $this->db->count_all_results('archive');

        $this->db->select('SID,name,sex,school,grade,student_type,consult_date,questionnaire_complete,paper_analysis_complete');
        $data = $this->db->get('archive', $count, $offset)->result_array();
        $result['result_array'] = $data;
        return $result;
    }

    function do_post($url, $post) {  
        $options = array(  
            'http' => array(  
                'method' => 'POST',  
                // 'content' => 'name=caiknife&email=caiknife@gmail.com',  
                'content' => http_build_query($post),  
            ),  
        );  
      
        $result = file_get_contents($url, false, stream_context_create($options));  
      
        return $result;  
    }

    function get_archive_by_sid($SID)
    {
        $this->db->where('SID',$SID); 
        $result = $this->db->get('archive')->result_array();
        return $result;
    }

    function add_archive($data)
    {
        $year = substr($data['consult_date'], 2, 2);
        // echo $year;
        $id = $this->db->query('select count(*)+1 as id from archive  where SID like "'.$year.'%"')->result_array()[0]['id'];
        $id_str = str_pad($id, 5,"0", STR_PAD_LEFT);
        $SID = $year.$id_str;
        $data['SID'] = $SID;

        // echo json_encode($data);
        $result = $this->db->insert('archive', $data);
        return $result;
    }

    function modify_archive($data)
    {
        $this->db->where('SID',$data['SID']);
        $result = $this->db->update('archive', $data);
        return $result;
    }

    function delete_archive($SID)
    {
        $this->db->where('SID',$SID); 
        $this->db->delete('archive');

        $this->db->where('SID',$SID); 
        $this->db->delete('questionnaire');
    }
}
