<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>问卷调查</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/css/normalize.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/css/demo.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/css/component.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/css/cs-select.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('rs/css/cs-skin-boxes.css');?>" />
		<script src="<?php echo base_url('rs/js/modernizr.custom.js');?>"></script>
	</head>
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>问卷调查表</h1>
				</div>
				<form id="myform" class="fs-form fs-form-full" autocomplete="off">
					<ol class="fs-fields">
						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" for="q1" data-info="学习目标">很明确学习的目的是什么</label>
							<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
								<span>
									<input id="q1a" name="q1" type="radio" value="social"/>
									<label for="q1a" class="radio-social">符合</label>
								</span>
								<span>
									<input id="q1b" name="q1" type="radio" value="mobile"/>
									<label for="q1b" class="radio-mobile">一般符合</label>
								</span>
								<span>
									<input id="q1c" name="q1" type="radio" value="conversion"/>
									<label for="q1c" class="radio-conversion">不符合</label>
								</span>
							</div>
						</li>
						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="学习目标">很明确学习的目的是什么</label>
							<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
								<span>
									<input id="q2a" name="q2" type="radio" value="social"/>
									<label for="q2a" class="radio-social">符合</label>
								</span>
								<span>
									<input id="q2b" name="q2" type="radio" value="mobile"/>
									<label for="q2b" class="radio-mobile">一般符合</label>
								</span>
								<span>
									<input id="q2c" name="q2" type="radio" value="conversion"/>
									<label for="q2c" class="radio-conversion">不符合</label>
								</span>
							</div>
						</li>
					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="submit">提交问卷</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

		</div><!-- /container -->
		<script src="<?php echo base_url('rs/js/classie.js');?>"></script>
		<script src="<?php echo base_url('rs/js/selectFx.js');?>"></script>
		<script src="<?php echo base_url('rs/js/fullscreenForm.js');?>"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body>
</html>