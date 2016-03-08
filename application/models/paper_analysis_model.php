<?php

/**
* 类名(questionnaire_model)
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
class paper_analysis_model extends CI_Model
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

    function get_titles()
    {
        $this->db->select('title_id,title');
        $this->db->where('enable', 1);
        $data = $this->db->get('paper_analysis_title')->result_array();
        return $data;
    }

    function get_answers_by_title_id($title_id)
    {   
        $this->db->where('title_id', $title_id);
        $query = $this->db->get('paper_analysis_answer');
        $data = $query->result_array();
        return $data;
    }

    function get_all($SID, $pat_id)
    {   
        $all = array();
        $titles = $this->get_titles();
        $selects = $this->get_selects($SID, $pat_id);
        foreach ($titles as $title) {
            $answers = $this->get_answers_by_title_id($title['title_id']);
            $answer_with_select = array();
            foreach ($answers as $answer) {
                $answer['select'] = 0;
                if(in_array($answer['answer_id'], $selects))
                {
                    $answer['select'] = 1;
                }
                array_push($answer_with_select, $answer);
            }
            
            $title['answers'] = $answer_with_select;
            // echo json_encode($title);
            array_push($all, $title);
        }
        return $all;
    }

    function get_selects($SID, $pat_id)
    {
        $this->db->where('SID',$SID);
        $this->db->where('pat_id',$pat_id);
        $query = $this->db->get('paper_analysis');
        $result = $query->result_array();
        // echo json_encode($result);

        $selects = array();
        foreach ($result as $select) {
            array_push($selects, $select['answer_id']);
        }
        return $selects;
    }

    function submit($SID, $pat_id, $select, $update_time)
    {
        $this->db->where('SID',$SID);
        $this->db->where('pat_id',$pat_id);
        $this->db->delete('paper_analysis');

        foreach ($select as $key => $value) {
            $data = array(
                'SID'=>$SID,
                'pat_id'=>$pat_id,
                'title_id'=>$key,
                'answer_id'=>$value,
                'update_time'=>$update_time,
            );
            $this->db->insert('paper_analysis', $data);
        }
        $title_count = $this->db->count_all('paper_analysis_title');

        $this->db->where('SID',$SID);
        $this->db->where('pat_id',$pat_id);
        $query = $this->db->get('paper_analysis');
        $select_count = $query->num_rows();

        if($title_count == $select_count){
            $this->db->where('SID',$SID);
            $this->db->where('pat_id',$pat_id);
            $this->db->update('paper_analysis_transaction', array('analysis_complete'=>2));
            return 2;

        }else{
            $this->db->where('SID',$SID);
            $this->db->where('pat_id',$pat_id);
            $this->db->update('paper_analysis_transaction', array('analysis_complete'=>1));
            return 1;
        }
    }

    function add_paper_analysis_transaction($SID, $rows)
    {
        $this->db->where('SID',$SID);
        $this->db->delete('paper_analysis_transaction');

        $analysis_complete_all = true;
        foreach ($rows as $row) {
            if($row->analysis_complete != '2'){
                $analysis_complete_all = false;
            }
            $data = array(
                'SID'=>$SID,
                'pat_id'=>$row->pat_id,
                'subject'=>$row->subject,
                'score_1'=>$row->score_1,
                'score_2'=>$row->score_2,
                'score_3'=>$row->score_3,
                'analysis_complete'=>$row->analysis_complete
            );
            $this->db->insert('paper_analysis_transaction', $data);
        }
        if($analysis_complete_all == true){
            $this->db->where('SID',$SID);
            $this->db->update('archive', array('paper_analysis_complete'=>2));

        }else{
            $this->db->where('SID',$SID);
            $this->db->update('archive', array('paper_analysis_complete'=>1));
        }
        return 1;
    }

    function get_paper_analysis_by_sid($SID)
    {
        $this->db->where('SID',$SID);
        $query = $this->db->get('paper_analysis_transaction');
        $result = $query->result_array();
        return $result;
    }

    function compute_score($SID)
    {
        $query = $this->db->query("select aa.cid,sum(bb.score) as score from
(select a.cid,a.title_id,b.answer_id from
questionnaire_title a join questionnaire b on a.title_id=b.title_id
where b.SID='".$SID."') aa
join 
(select answer_id,score from questionnaire_answer) bb
on aa.answer_id = bb.answer_id
group by aa.cid");
        $result = $query->result_array();
        echo json_encode($result);
    }
}
