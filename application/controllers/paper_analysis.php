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
    }

    /**
    *录入任务界面的主函数, 显示主界面
    * @return void
    */
    function index()
    {
        $pat_id = $this->uri->segment(3);
        $result['data'] = $this->paper_analysis_model->get_all($pat_id);
        $result['pat_id'] = $pat_id;
        // shuffle($result['data']);
        $this->load->view('paper_analysis/paper_analysis', $result);
    }

    function submit()
    {
        $SID = get_post('SID');
        $update_time = date('Y-m-d H:i:s', time());
        $select = get_post('select');

        $this->paper_analysis_model->submit($SID, $select, $update_time);
        echo '提交成功！';
    }

    function compute_score()
    {
        $SID = $this->uri->segment(3);
        $this->paper_analysis_model->compute_score($SID);
    }
}
