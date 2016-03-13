<?php 
/**
* 类名(report)
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
class report extends CI_Controller
{
    /**
    *加载函数
    *加载一些库函数和头文件
    */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('common_helper');//公共函数
        $this->load->model('archive_model');
        $this->load->model('questionnaire_model');
        $this->load->model('report_model');
    }

    /**
    *录入任务界面的主函数, 显示主界面
    * @return void
    */

    function index()
    {
        $SID = $_GET['SID'];
        $result['qresult'] = $this->questionnaire_model->get_result($SID);
        $result['maxs'] = $this->questionnaire_model->get_max_scores();
        $result['profile'] = $this->archive_model->get_archive_by_sid($SID)[0];
        $this->load->view('report/report', $result);
    }

    function result()
    {
        $SID = $_GET['SID'];
        $result = $this->questionnaire_model->get_result($SID);
        echo json_encode($result);
    }
}
