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
class questionnaire_model extends CI_Model
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
        $this->db->select('title_id,cid,title');
        $this->db->where('enable', 1);
        $data = $this->db->get('questionnaire_title')->result_array();
        return $data;
    }

    function get_answers_by_title_id($title_id)
    {   
        $this->db->where('title_id', $title_id);
        $query = $this->db->get('questionnaire_answer');
        $data = $query->result_array();
        return $data;
    }

    function get_all($SID)
    {   
        $all = array();
        $titles = $this->get_titles();
        $selects = $this->get_selects($SID);
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

    function get_selects($SID)
    {
        $query = $this->db->where('SID',$SID);
        $result = $query->get('questionnaire')->result_array();
        $selects = array();
        foreach ($result as $select) {
            array_push($selects, $select['answer_id']);
        }
        return $selects;
    }

    function submit($SID, $select, $update_time)
    {
        $this->db->where('SID',$SID);
        $this->db->delete('questionnaire');

        foreach ($select as $key => $value) {
            $data = array(
                'SID'=>$SID,
                'title_id'=>$key,
                'answer_id'=>$value,
                'update_time'=>$update_time,
            );
            $this->db->insert('questionnaire', $data);
        }
        $title_count = $this->db->count_all('questionnaire_title');

        $this->db->where('SID',$SID);
        $query = $this->db->get('questionnaire');
        $select_count = $query->num_rows();
        if($title_count == $select_count){
            $this->db->where('SID',$SID);
            $this->db->update('archive', array('questionnaire_complete'=>2));

        }else{
            $this->db->where('SID',$SID);
            $this->db->update('archive', array('questionnaire_complete'=>1));
        }
        return 1;
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
group by aa.cid
order by aa.cid");
        $scores = $query->result_array();
        
        return $scores;
    }

    function get_result($SID)
    {
        $scores = $this->compute_score($SID);
        $sdic = array();
        foreach ($scores as $s) {
            $sdic[$s['cid']] = $s['score'];
        }
        $final = array();
        $query = $this->db->query("select a.title,b.* from questionnaire_category a
join questionnaire_result b
on a.cid=b.cid");
        $result = $query->result_array();
        foreach ($result as $r) {
            if($sdic[$r['cid']] >= $r['lower_score'] && $sdic[$r['cid']] <= $r['upper_score']){
                $r['score'] = $sdic[$r['cid']];
                array_push($final, $r);
            }
        }
        return $final;
    }

    function get_max_scores(){
        $query = $this->db->query("select a.cid,a.title,max(b.upper_score) as max from questionnaire_category a
join questionnaire_result b
on a.cid=b.cid
group by a.cid,a.title");
        $maxs = $query->result_array();
        
        return $maxs;
    }
}
