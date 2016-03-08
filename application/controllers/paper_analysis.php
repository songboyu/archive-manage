<?php 
/**
* 类名(questionnaire)
*
* 功能描述:数据库C层，用来控制数据库和界面
*
* @package  Controllers
* @author   song
* @license  No licence
* @version  Release: @paclage_version@
* @link     about:blank
* 
*/
class paper_analysis extends CI_Controller
{
    /**
    *加载函数
    *加载一些库函数和头文件
    */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('common_helper');//公共函数
        $this->load->model('paper_analysis_model');
        $this->load->model('archive_model');
    }

    /**
    *录入任务界面的主函数, 显示主界面
    * @return void
    */
    function index()
    {  
        $SID = $this->uri->segment(3);
        $pat_id = $_GET['pat_id'];

        $result['SID'] = $SID; 
        $result['pat_id'] = $pat_id;

        $result['profile'] = $this->archive_model->get_archive_by_sid($SID)[0];
        $result['data'] = $this->paper_analysis_model->get_all($SID, $pat_id);
        // shuffle($result['data']);
        // echo json_encode($result);
        $this->load->view('paper_analysis/paper_analysis', $result);
    }

    function submit()
    {
        $SID = $_POST['SID'];
        $pat_id = $_POST['pat_id'];
        $update_time = date('Y-m-d H:i:s', time());
        $select = $_POST['select'];
        
        $result = $this->paper_analysis_model->submit($SID, $pat_id, $select, $update_time);
        echo $result;
    }

    function get_paper_analysis_by_sid()
    {
        $SID = $_POST['SID'];
        $result['data'] = $this->paper_analysis_model->get_paper_analysis_by_sid($SID);
        echo json_encode($result);
    }

    function add_paper_analysis_transaction()
    {
        $json_string = $_POST['data'];

        $json_string = html_entity_decode($json_string);
        $json_string = json_decode($json_string);

        $SID = $json_string->SID;
        $rows = $json_string->data;

        $result = $this->paper_analysis_model->add_paper_analysis_transaction($SID, $rows);
        echo 1;
    }

    function compute_score()
    {
        $SID = $this->uri->segment(3);
        $this->paper_analysis_model->compute_score($SID);
    }
}
