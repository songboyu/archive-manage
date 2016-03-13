<style>
.form-group{
	margin-bottom:4px;
}
.portlet{
	margin-bottom:0px;
}
</style>
<script language="javascript" src="<?php echo base_url('rs/js/jquery.jqprint-0.3.js')?>"></script>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class='row' style='font-family:"Helvetica Neue",Helvetica,Arial,sans-serif'>
	<div class='col-md-12'>
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class='portlet box green-haze'>
			<div class='portlet-title'>
				<div class='caption'>
					<i class='fa fa-globe'></i>
					<font style = "font-size:0.8em">
						<?php echo $title ?>
					</font>
				</div>
				<div class='actions'>
					<a class='btn btn-default btn-sm' id='refresh'>
						<i class='fa fa-refresh' ></i> 刷新列表 </a>
					</a>
					<a href='#archive_add' data-toggle='modal' class='btn btn-default btn-sm'>
						<i class='fa fa-plus'></i> 新增档案
					</a>
				</div>
			</div>

			<div class='portlet-body'>
				<table class='table table-striped table-bordered table-hover' id='archive_manage_table'>
					<thead>
						<tr>
							<th width='70'>学生编号</th>
							<th width='50'>姓名</th>
							<th width='10'>性别</th>
							<th>学校</th>
							<th width='30'>年级</th>
							<th width='30'>类型</th>
							<th width='60'>咨询时间</th>
							<th>问卷调查</th>
							<th>试卷分析</th>
							<th>操作</th>
							<th>报告</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan='11'>数据获取中，请稍后...</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END CONTENT -->
<script>
	jQuery(document).ready(function() {
		//全局js函数，header中定义
		global_function();
		//common_function.js中定义，渲染侧边栏
     	set_sidebar_selected("#archive");
		//加载数据表格
		archive_manage_table_init();
	});

	$('#refresh').click(function (){
		reload_datatable("#archive_manage_table");
	})

	function archive_manage_table_init(){
		var table = $("#archive_manage_table");
		table.dataTable( {
			'pageLength': 10,
			'bProcessing': true,
			'bServerSide': true,
			'sPaginationType': 'full_numbers',
			'sAjaxSource': '<?php echo base_url("archive/get_archive_list")?>',
			'oLanguage': {
				'sLengthMenu': '每页显示 _MENU_ 记录',
				'sZeroRecords': '抱歉， 没有找到',
				'sInfo': '从 _START_ 到 _END_ /共 _TOTAL_ 条数据',
				'sInfoEmpty': '没有数据',
				'sInfoFiltered': '(从 _MAX_ 条数据中检索)',
				'oPaginate': {  
					'sFirst': '首页',  
					'sPrevious': '前一页',
					'sNext': '后一页',  
					'sLast': '尾页'  
				}, 
				'sZeroRecords': '没有检索到数据',  
				'sProcessing': '<img src="<?php echo base_url("rs/global/img/loading-spinner-blue.gif");?>" />'
			},
			'aaSorting':[//设置默认排序列
				[ 0, 'desc' ]
			],
			"columns": //columns属性，配置具体列属性，详见http://sgyyz.blog.51cto.com/5069360/1408251
			[
				{ "data": "SID", 'className': 'td_text_align_center' },
				{ "data": "name", 'className': 'td_text_align_center' },
				{ "data": "sex", 'className': 'td_text_align_center' },
				{ "data": "school", 'className': 'td_text_align_center' },
				{ "data": "grade", 'className': 'td_text_align_center' },
				{ "data": "student_type", 'className': 'td_text_align_center' },
				{ "data": "consult_date", 'className': 'td_text_align_center' },
				{ "data": "questionnaire_complete", 'className': 'td_text_align_center'},
				{ "data": "paper_analysis_complete", 'className': 'td_text_align_center'},
				{ 'className': 'td_text_align_center'},
				{ 'className': 'td_text_align_center'},
			],
			'columnDefs': [
				{
					'targets': [0], // 目标列位置，下标从0开始
					'data': 'SID' // 数据列名
				},
				{
					'targets': [6],
					'data':'consult_date',
					'render': function(data, type, full) {
						return data.substring(0,10);
					}
				},
				{
					"targets": [7],
					"data": "questionnaire_complete",
					"render": function(data, type, full){
						if(data==0)
							return '<span class="label label-sm label-warning">\
										<a style="color:white" target="_blank" href="'+ base_url + 'questionnaire/index/' + full.SID + '"> 未开始 </a>\
									</span>';
						else if(data==1)
							return '<span class="label label-sm label-danger">\
										<a style="color:white" target="_blank" href="'+ base_url + 'questionnaire/index/' + full.SID + '"> 未完成 </a>\
									</span>';
						else if(data==2)
							return '<span class="label label-sm label-success">\
										<a style="color:white" target="_blank" href="'+ base_url + 'questionnaire/index/' + full.SID + '"> 已完成 </a>\
									</span>';
					}
				},
				{
					"targets": [8],
					"data": "paper_analysis_complete",
					"render": function(data, type, full){
						if(data==0)
							return '<span class="label label-sm label-warning">\
									<a style="color:white" href="#paper_analysis_transaction" data-toggle="modal" onclick="paper_analysis_transaction(\''+ full.SID +'\');"> 未开始</a>\
									</span>';
						else if(data==1)
							
							return '<span class="label label-sm label-danger">\
									<a style="color:white" href="#paper_analysis_transaction" data-toggle="modal" onclick="paper_analysis_transaction(\''+ full.SID +'\');"> 未完成</a>\
									</span>';
						else if(data==2)
							
							return '<span class="label label-sm label-success">\
									<a style="color:white" href="#paper_analysis_transaction" data-toggle="modal" onclick="paper_analysis_transaction(\''+ full.SID +'\');"> 已完成</a>\
									</span>';
					}
				},
				// 增加一列，包括删除和修改
				{
					'targets': [9],
					'data': 'time',
					'render': function(data, type, full) { // 返回自定义内容
						return '\
						<a href="#archive_modify" data-toggle="modal" onclick="modify_archive(\''+ full.SID +'\');"><i class="fa fa-edit"></i> 修改档案</a>\
						&nbsp;\
						<a href="javascript:void(0);" onclick="delete_archive(\''+ full.SID +'\');"><i class="fa fa-times"></i> 删除档案</a>';
					}
				},
				{
					'targets': [10],
					'data': 'time',
					'render': function(data, type, full) { // 返回自定义内容
						if(full.questionnaire_complete==2 && full.paper_analysis_complete==2)
							return '<a href="#" onclick="print_report(\''+ full.SID +'\');"><i class="fa fa-print"></i> 打印报告</a>';
						else
							return '';
					}
				}
			],
		} );
		//修改perpage下拉菜单样式为扁平化
		$("#archive_manage_table_wrapper").find(".dataTables_length select").select2(); 
	}

	function modify_archive(SID) {
		$.post(base_url+'archive/get_archive_by_sid', {
        	SID:SID
        },
        function(data){
        	var full = JSON.parse(data);
            $('#modify #SID').val(full.SID),
      	    $("#modify #name").val(full.name);
	        $("#modify #sex").val(full.sex);
	        $("#modify #birthday").val(full.birthday);
	        $("#modify #school").val(full.school);
	        $("#modify #grade").val(full.grade);
	        $("#modify #student_type").val(full.student_type);
	        $("#modify #phone_number").val(full.phone_number);
	        $("#modify #qq").val(full.qq);
	        $("#modify #wechat").val(full.wechat);
	        $("#modify #address").val(full.address);
	        $("#modify #info_channel").val(full.info_channel);
	        $("#modify #good_subject").val(full.good_subject);
	        $("#modify #bad_subject").val(full.bad_subject);
	        $("#modify #interest").val(full.interest);
	        $("#modify #remediation_experience").val(full.remediation_experience);
        });
	}

	function delete_archive(SID) {
		if(confirm('确认删除？')!=true)
			return false;
		$.post(base_url+'archive/delete_archive', {
        	SID:SID
        },
        function(data){
      	  reload_datatable("#archive_manage_table");
        });
	}

	function paper_analysis_transaction(SID){
		current_pat_id = 1;
		$('#paper_analysis_SID').html(SID);
		$.post(base_url+'paper_analysis/get_paper_analysis_by_sid', {
        	SID:SID
        },
        function(result){
        	data = JSON.parse(result).data;
        	// console.log(data);
        	if(data.length == 0){
        		$('#subject_list').empty();
        		add_subject();
        	}else{
        		$('#subject_list').empty();
	        	for(i in data){
	        		add_subject(data[i]);
	        	}
        	}
        });
	}

	function print_report(SID) {
		$.get(base_url+'report/index', {
        	SID:SID
        },
        function(result){
        	var doc = $(result);
        	doc.jqprint({
        		debug: false, //如果是true则可以显示iframe查看效果（iframe默认高和宽都很小，可以再源码中调大），默认是false
		    	importCSS: false, //true表示引进原来的页面的css，默认是true。（如果是true，先会找$("link[media=print]")，若没有会去找$("link")中的css文件）
		    	printContainer: true, //表示如果原来选择的对象必须被纳入打印（注意：设置为false可能会打破你的CSS规则）。
		    	operaSupport: true//表示如果插件也必须支持歌opera浏览器，在这种情况下，它提供了建立一个临时的打印选项卡。默认是true
        	});
        });
	}
</script>
