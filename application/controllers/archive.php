<?php 
/**
* 类名(archive)
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
class archive extends CI_Controller
{
    /**
    *加载函数
    *加载一些库函数和头文件
    */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('pageination_helper');//分页函数
        $this->load->helper('common_helper');//公共函数
        $this->load->model('archive_model');//M层的数据库读和写文件
        $this->load->database();
    }

    /**
    *录入任务界面的主函数, 显示主界面
    * @return void
    */

    function index()
    {
        $data['title'] = '档案信息列表';

        $this->load->view('header', $data);
        $this->load->view('archive/archive_add');
        $this->load->view('archive/archive_modify');
        $this->load->view('paper_analysis/paper_analysis_transaction');
        $this->load->view('archive/archive_list');
        $this->load->view('footer');
    }

    /**
    * 函数get_archive_list, 返回任务列表datatables的ajax请求数据
    * @return 数据json数据
    */
    function get_archive_list()
    {
        $offset = get_get('iDisplayStart');
        $count = get_get('iDisplayLength');
        //获取被排列的列名称
        $sort_col = get_get('mDataProp_'.get_get('iSortCol_0'));
        $sort_type = get_get('sSortDir_0');
        $sort_col_num = get_get('iSortingCols');
        //获取搜索内容
        $search_str = get_get('sSearch');

        if($search_str==''){
            $result = $this->archive_model->get_archives($offset, $count, $sort_col, $sort_type);
        }else{
            $result = $this->archive_model->get_archives($offset, $count, $sort_col, $sort_type, $search_str);
        }

        $output = array(
            "sEcho" => intval(get_get('sEcho')),
            "iTotalRecords" => $result['total_records'],
            "iTotalDisplayRecords" => $result['display_records'],
            "aaData" => $result['result_array']
        );
        
        echo json_encode($output);
    }
    /**
    * 新增档案函数。
    * @return void
    */
    function add_archive()
    {
        $_POST['consult_date'] = date('Y-m-d H:i:s', time());
        $result = $this->archive_model->add_archive($_POST);
        echo $result;
    }

    function get_archive_by_sid()
    {
        $SID = $_POST['SID'];
        $result = $this->archive_model->get_archive_by_sid($SID);
        echo json_encode($result[0]);
    }

    function modify_archive()
    {
        $result = $this->archive_model->modify_archive($_POST);
        echo $result;
    }
    /**
    * 函数delete_archive,删除档案函数。
    * 输入：档案id
    * 输出：把对应档案从数据库中删除
    * @return void
    */
    function delete_archive()
    {
        $SID = $_POST['SID'];
        $data=$this->archive_model->delete_archive($SID);
    }
}
