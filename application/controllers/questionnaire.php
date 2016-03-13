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
class questionnaire extends CI_Controller
{
    /**
    *加载函数
    *加载一些库函数和头文件
    */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('common_helper');//公共函数
        $this->load->model('questionnaire_model');
        $this->load->model('archive_model');
    }

    /**
    *录入任务界面的主函数, 显示主界面
    * @return void
    */
    function index()
    {
        $SID = $this->uri->segment(3);
        $result['data'] = $this->questionnaire_model->get_all($SID);
        $result['profile'] = $this->archive_model->get_archive_by_sid($SID)[0];
        // echo json_encode($result['profile']);
        $result['SID'] = $SID;
        shuffle($result['data']);
        $this->load->view('questionnaire/questionnaire', $result);
    }

    function submit()
    {
        $SID = $_POST['SID'];
        $update_time = date('Y-m-d H:i:s', time());
        $select = $_POST['select'];

        $result = $this->questionnaire_model->submit($SID, $select, $update_time);
        echo $result;
    }

    function page()
    {
        $this->load->view('questionnaire/page');
    }
}
