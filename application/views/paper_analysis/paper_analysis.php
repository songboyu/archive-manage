<!DOCTYPE html>

<html>
  <head>
    <title>试卷分析表</title>
    <meta charset="UTF-8" />
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<link href="<?php echo base_url('rs/css/styles.css');?>" rel='stylesheet'>
  </head>

  <body style="background:url(../../rs/images/background_1.jpg);">
    <div class="container">
	    <div id="message">
	      <p>试卷分析表</p>
	    </div>
	 	<br>
	    <div id="message" style="padding:1px;background:#335279;font-size:12px">
	      <p><?php echo $profile['SID'].' '.$profile['name'].' '.$profile['school'].' '.$profile['grade'].' '.$profile['student_type']; ?></p>
	    </div>
	    <br><br>
<?php 

		$i = 0;
        foreach ($data as $title) {
            $i++;
            echo '<label>'.$i.'. '.$title['title'].'</label>';
            echo '<fieldset>';
            foreach ($title['answers'] as $answer) {
            	if($answer['select']==0)
            		echo '<input type="radio" name="'.$answer['title_id'].'" value="'.$answer['answer_id'].'" /> '.$answer['answer'];
            	else
            		echo '<input type="radio" name="'.$answer['title_id'].'" value="'.$answer['answer_id'].'" checked/> '.$answer['answer'];
            }
            echo '</fieldset>';
            echo '<br>';
        }
?>
	     <button id='submit'>提交</button>
    </div>
</body>
<script>
$().ready(function() {
	$('#submit').click(function(){
		var data = {};
		var SID = "<?php echo $SID;?>";
		var pat_id = "<?php echo $pat_id;?>";
		// console.log(SID+' '+pat_id);

		var parent = window.parent.opener;
		var paper_analysis_button = $('#subject_list div.row[dataid="'+pat_id+'"] #paper_analysis_button', parent.document);

		console.log(paper_analysis_button);
		var select = {};
		$('input:radio:checked').each(function(){ 
			select[this.name] = this.value; 
		});
		$.ajax({
			type:'POST',
			data:{
				'SID':SID,
				'pat_id':pat_id,
				'select':select
			},
			url:"<?php echo base_url('paper_analysis/submit');?>",
			success:function(data){
				alert("提交成功！");
				if(data == '1'){
					// console.log('未完成');
					paper_analysis_button.val('未完成');
      				paper_analysis_button.attr('class','btn red');
      				paper_analysis_button.attr('dataid','1');
				}else if(data == '2'){
					paper_analysis_button.val('已完成');
      				paper_analysis_button.attr('class','btn green');
      				paper_analysis_button.attr('dataid','2');
				}
				window.close();
			}
		});
	});
});
</script>
</html>
