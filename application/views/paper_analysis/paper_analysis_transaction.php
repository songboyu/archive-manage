<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="paper_analysis_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:700px">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      </div> -->
      <div class="modal-body">
          <div class="portlet box green-haze" id="add">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i> 试卷分析
              </div>
              <div class='actions'>
                <a class='btn btn-default btn-sm' id='refresh'>
                  <i class='fa fa-plus' ></i> 新增科目 </a>
                </a>
              </div>
            </div>
            <div class="portlet-body form">
              <form class="form-horizontal" role="form">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-2">
                      <select class="form-control" id='subject'>
                        <option>数学</option>
                        <option>物理</option>
                        <option>化学</option>
                        <option>生物</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" id='score1'>
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" id='score2'>
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" id='score3'>
                    </div>
                    <div>
                      <input type="button" class="btn green-haze" style="width:100px" id='paper_analysis' value="试卷分析">
                      <input type="button" class="btn blue" style="width:100px" id='paper_analysis_delete' value="删除">
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-4 col-md-6">
                      <button type="button" class="btn green-haze" id="submit">保存</button>
                      <button type="reset" class="btn blue" id="reset">重置</button>
                      <button type="button" class="btn default" data-dismiss="modal" aria-hidden="true" id='cancle'>取消</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<script type="text/javascript">
  var base_url = "<?php echo base_url();?>";
  $('#paper_analysis').click(function(){
    window.open(base_url+'paper_analysis/index/');
  });
  $("#submit").click(function() {
    if(confirm('确认添加？')!=true)
      return;
    $.post(base_url+"archive/add_archive", 
      {
        name:         $("#add #name").val(),
        sex:          $("#add #sex").val(),
        birthday:     $("#add #birthday").val(),
        school:       $("#add #school").val(),
        grade:        $("#add #grade").val(),
        student_type: $("#add #student_type").val(),
        phone_number: $("#add #phone_number").val(),
        qq:           $("#add #qq").val(),
        wechat:       $("#add #wechat").val(),
        address:      $("#add #address").val(),
        info_channel: $("#add #info_channel").val(),
        good_subject: $("#add #good_subject").val(),
        bad_subject:  $("#add #bad_subject").val(),
        interest:     $("#add #interest").val(),
        remediation_experience: $("#remediation_experience").val(),
      },
      function(data){
        if(data == 1){
          // alert('添加成功！');
          $("#add #reset").trigger("click");
          $("#add #cancle").trigger("click");
          $("#add input[name='sex']").removeAttr('checked');
          reload_datatable('#archive_manage_table');
        }

      });
  });
</script>