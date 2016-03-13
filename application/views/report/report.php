<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="<?php echo base_url('rs/global/plugins/jquery-1.11.0.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('rs/js/echarts.min.js');?>" type="text/javascript"></script>
	<link href="<?php echo base_url('rs/css/styles.css');?>" rel='stylesheet'>
</head>
<style>
th {
	font-size:13px;
	padding:8px;
	width: 80px;
	font-weight: bold;
}
td {
	font-size:12px;
	padding:8px;
	white-space: nowrap; /* 自适应宽度*/
	font-weight: normal;
}
.container {
	padding:20px 10px 20px;
	overflow:hidden;
}
.head {
	text-align: center;
	font-size: 18px;
	padding: 10px;
	font-weight: bold;
}
.basic-info {
	text-align: left;
	margin: 0px auto;
	width: 95%;
	table-layout:fixed;
	padding:3px;
}
p {
	line-height: 20px; 
}
.inline_container {

}
.qresult {
	width: 46%;
	height: 240px;
	float:left;
	padding:0px 2%;
}
</style>
<script>
$().ready(function() {
	var myChart = echarts.init(document.getElementById('qresult'));
	option = {
	    tooltip: {},
	    legend: {
	        // data: ['能力分配']
	    },
	    radar: {
	        // shape: 'circle',
	        indicator: [
	        <?php foreach ($maxs as $max) {
	        	echo "{ name: '".substr($max['title'],6)."', max: ".($max['max'])."},";
	        }?>
	        ]
	    },
	    series: [{
	        name: '预算 vs 开销（Budget vs spending）',
	        type: 'radar',
	        // areaStyle: {normal: {}},
	        data : [
	             {
	                value : [<?php foreach ($qresult as $r) {
	                	echo ($r['score']).',';
	                }?>],
	                name : '能力分配'
	            }
	        ]
	    }]
	};
	myChart.setOption(option);
});
</script>
<body>
	<div class="container">
		<div class="head" style="font-size:20px">学生综合测评报告</div>
		<br>
		<div style="text-align:right;margin-right:20px">咨询时间：<?php echo substr($profile['consult_date'],0,10)?></div>
	    <hr>
	    <table class="basic-info">
	    	<tr>
	    		<th rowspan="3">基本信息</th>
		      	<td>学号：<?php echo $profile['SID']?></td>
		      	<td>姓名：<?php echo $profile['name']?></td>
		  		<td>性别：<?php echo $profile['sex']?></td>
	  		</tr>
	  		<tr>
		  		<td>学校：<?php echo $profile['school']?></td>
		      	<td>年级：<?php echo $profile['grade']?></td>
		      	<td>类型：<?php echo $profile['student_type']?></td>
	  		</tr>
	  		<tr>
		  		<td colspan ="2">住址：<?php echo $profile['address']?></td>
		  		<td>爱好：<?php echo $profile['interest']?></td>
	  		</tr>
	  		<tr>
	  			<th>联系方式</th>
		  		<td>电话：<?php echo $profile['phone_number']?></td>
		      	<td>QQ号：<?php echo $profile['qq']?></td>
		      	<td>微信：<?php echo $profile['wechat']?></td>
	  		</tr>
	  		<tr>
	  			<th>学生特点</th>
		  		<td>优势科目：<?php echo $profile['good_subject']?></td>
		      	<td>劣势科目：<?php echo $profile['bad_subject']?></td>
		      	<td>补习经历：<?php echo $profile['remediation_experience']?></td>
	  		</tr>
	    </table>
	 	<hr>
	    <br><br>
	    <div class="head">问卷评测</div>
	    <br>
	    <div class="inline_container">
	    	<div class="qresult" id="qresult"></div>
		   	<?php foreach ($qresult as $r) {?>
		    <div class="qresult">
		    	<p style="font-size:13px;font-weight: bold;"><?php echo $r['title'];?></p>
		    	<p>得分：<?php echo $r['score'];?></p>
		    	<p>评测结果：<?php echo $r['result'];?></p>
		    	<p>建议：<?php echo $r['suggestion'];?></p>
		    </div>
		    <br>
		    <?php } ?>
		</div>
	<div>
<body>
</html>