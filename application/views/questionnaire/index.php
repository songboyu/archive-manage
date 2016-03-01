<!DOCTYPE html>

<html>
  <head>
    <title>问卷调查表</title>
    <meta charset="UTF-8" />
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<link href="<?php echo base_url('rs/css/styles.css');?>" rel='stylesheet'>
  </head>

  <body>
    <div class="container">
	    <div id="message">
	      <p>问卷调查表</p>
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
		var select = {};
		$('input:radio:checked').each(function(){ 
			select[this.name] = this.value; 
		});
		$.ajax({
			type:'POST',
			data:{
				'SID':SID,
				'select':select
			},
			url:"<?php echo base_url('questionnaire/submit');?>",
			success:function(data){
				alert(data);
				window.close();
			}
		});
	});
});
</script>
</html>
