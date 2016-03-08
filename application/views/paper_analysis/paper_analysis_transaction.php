<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="paper_analysis_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:700px">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      </div> -->
      <div class="modal-body">
          <div class="portlet box green-haze">
            <input id="paper_analysis_SID" hidden>
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i> 试卷分析
              </div>
              <div class='actions'>
                <a class='btn btn-default btn-sm' id='add_subject'>
                  <i class='fa fa-plus' ></i> 新增科目 </a>
                </a>
              </div>
            </div>
            <div class="portlet-body form">
              <form class="form-horizontal" role="form">
                <div class="form-body" id='subject_list'>
                </div>
                <div class="form-actions" style='padding:5px 0px'>
                  <div class="row">
                    <div style='margin-left:78%'>
                      <button type="button" class="btn green" id='submit_paper_analysis'>保存</button>
                      <button type="button" class="btn default" data-dismiss="modal" aria-hidden="true" id='cancle_paper_analysis'>关闭</button>
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
  var current_pat_id = -1;
  var base_url = "<?php echo base_url();?>";

  $("input[name='score']").keyup(function(){     
        var tmptxt=$(this).val();     
        $(this).val(tmptxt.replace(/\D|^0/g,''));     
    }).bind("paste",function(){     
        var tmptxt=$(this).val();     
        $(this).val(tmptxt.replace(/\D|^0/g,''));     
    }).css("ime-mode", "disabled");  

  function add_subject(data){
    if(current_pat_id == -1){
      if(data == undefined){
        current_pat_id = 1
      }else{
        current_pat_id = data.pat_id
      }
    }
    // console.log(data)
    if(data == undefined){
      data={
        pat_id:current_pat_id,
        score_1:'',
        score_2:'',
        score_3:'',
        subject:'数学',
        analysis_complete:0
      }
      current_pat_id += 1;
    }else{
      current_pat_id = parseInt(data.pat_id) + 1
    }

    row = $('<div class="row" style="margin-bottom:5px" dataid="'+data.pat_id+'">\
                    <div class="col-md-2">\
                      <select class="form-control" id="subject">\
                        <option name="数学">数学</option>\
                        <option name="物理">物理</option>\
                        <option name="化学">化学</option>\
                        <option name="生物">生物</option>\
                      </select>\
                    </div>\
                    <div class="col-md-2">\
                      <input type="text" class="form-control" name="score" id="score_1" value="'+data.score_1+'">\
                    </div>\
                    <div class="col-md-2">\
                      <input type="text" class="form-control" name="score" id="score_2" value="'+data.score_2+'">\
                    </div>\
                    <div class="col-md-2">\
                      <input type="text" class="form-control" name="score" id="score_3" value="'+data.score_3+'">\
                    </div>\
                    <div>\
                      <input type="button" disabled class="btn yellow" style="width:100px" dataid="0" onclick="paper_analysis('+data.pat_id+')" value="未开始" id="paper_analysis_button">\
                      <input type="button" class="btn blue" style="width:100px" onclick="paper_analysis_transaction_delete('+data.pat_id+')" value="删除">\
                    </div>\
                  </div>');
    $('#subject_list').append(row);

    option = row.find('option:contains('+data.subject+')');
    row.find(option.attr('selected',true));

    row.find("input[name='score']").keyup(function(){     
        var tmptxt=$(this).val();     
        $(this).val(tmptxt.replace(/\D|^0/g,''));     
    }).bind("paste",function(){     
        var tmptxt=$(this).val();     
        $(this).val(tmptxt.replace(/\D|^0/g,''));     
    }).css("ime-mode", "disabled");

    analysis_enable = true;
    row.find('input[name="score"]').each(function() {
      if($(this).val() == ''){
        analysis_enable = false;
      }
      $(this).bind("propertychange input",function(){
        // console.log(row.find('input#score_2').val())
        if(row.find('input#score_1').val() != '' &&
          row.find('input#score_2').val() != '' &&
          row.find('input#score_3').val() != ''){
          paper_analysis_button.attr('disabled', false);
        }
      });
    });

    paper_analysis_button = row.find('#paper_analysis_button');
    if(data.analysis_complete == 1){
      paper_analysis_button.val('未完成');
      paper_analysis_button.attr('class','btn red');
      paper_analysis_button.attr('dataid','1');
    }else if (data.analysis_complete == 2){
      // console.log(paper_analysis_button);
      paper_analysis_button.val('已完成');
      paper_analysis_button.attr('class','btn green');
      paper_analysis_button.attr('dataid','2');
    }

    if(analysis_enable==true){
      paper_analysis_button.attr('disabled', false);
    }
  }

  $('#add_subject').click(function() {
    add_subject()
  });

  function paper_analysis(pat_id){
    var SID = $('#paper_analysis_SID').text();
    window.open(base_url+'paper_analysis/index/'+SID+'?pat_id='+pat_id);
  }

  function paper_analysis_transaction_delete(pat_id){
    if(confirm('确认删除？')!=true)
      return;
    var row = $('.row[dataid="'+pat_id+'"]');
    // console.log(row);
    row.remove();
  }

  $("#submit_paper_analysis").click(function() {
    if(confirm('确认保存？')!=true)
      return;
    var post_data = new Array();
    var SID = $('#paper_analysis_SID').text();

    var rows = $('#subject_list div.row').each(function() {
      var row = {
        pat_id:$(this).attr('dataid'),
        subject:$(this).find('#subject').val(),
        score_1:$(this).find('#score_1').val(),
        score_2:$(this).find('#score_2').val(),
        score_3:$(this).find('#score_3').val(),
        analysis_complete:$(this).find('#paper_analysis_button').attr('dataid'),
      }
      post_data.push(row)
      // console.log(row)
    });
    $.post(base_url+"paper_analysis/add_paper_analysis_transaction", 
      {
        data:JSON.stringify({
          SID:SID,
          data:post_data
        })
      },
      function(data){
        if(data == 1){
          // alert('保存成功！');
          $("#cancle_paper_analysis").trigger("click");
          reload_datatable('#archive_manage_table');
        }
      });
  });
</script>