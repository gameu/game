
<style type="text/css" charset="utf-8">
                .form-checkbox{
                        text-align:left;
                        margin:10px 0 0 0;

                }
                .form-checkbox .form-checkbox-con{
                        width:10px;
                        height:10px;
                        left:82px;
                        top:3px;
                }
                .form-checkbox-title{
                        padding:0 0 0 100px;
                }
                .content-left .verifyCode{
                    width:100px;
                }
</style>
<div class="login-page">
    <div class="login-header">
            <div class="login-header-content">
                <img src=<?php echo Yii::app()->baseUrl."/images/login_register/logo.jpg";?> />
                <span class="font">公司自主平台</span>
            </div>
    </div>
        <?php $form=$this->beginWidget('CActiveForm', array(
                 'id'=>'registerform',
                 'enableAjaxValidation'=>false,
                 'action'=>Yii::app()->createUrl('loginregister/registercheck'),
                 'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'register-one'),
         )); ?>
	<?php echo $form->errorSummary($model); ?>
			<div class="register-common-o">
				<span>游戏厂商注册通行证</span>
			</div>
  <!---------------------------------------------------------------------------------注册第一部分----------------------------------------------->
			<div class="register-one-content clearfix" id="register1">
				<div class="left content-left">
					<div>
						<span class="left-head">填写基本信息（<span class="sign">*</span>必填）</span>
						<div class="form">
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'user'); ?>
                                                                <?php echo $form->textField($model,'user'); ?>
								<span class="error-tip">至少6字符,首位必为字母,支持数字、字母组合。</span>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'mail'); ?>
                                                                <?php echo $form->textField($model,'mail'); ?>
								<span class="error-tip none">请输入邮箱</span>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'pwd'); ?>
                                                                <?php echo $form->passwordField($model,'pwd'); ?>
								<span class="error-tip">请输入密码</span>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'repeatpwd'); ?>
                                                                <?php echo $form->passwordField($model,'repeatpwd'); ?>
								<span class="error-tip none">请确认密码</span>
							</div>
						</div>
					</div>
					<div>
						<span class="left-head">填写联系人信息（<span class="sign">*</span>必填）</span>
						<div class="form">
							<div class="form-row">
								<?php echo $form->labelEx($model,'c_name'); ?>
                                                                <?php echo $form->textField($model,'c_name'); ?>
								<span class="error-tip">请填写联系人</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'post'); ?>
                                                                <?php echo $form->textField($model,'post'); ?>
								<span class="error-tip none">请输入职位</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'c_qq'); ?>
                                                                <?php echo $form->textField($model,'c_qq'); ?>
								<span class="error-tip">请输入QQ</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'c_tel'); ?>
                                                                <?php echo $form->textField($model,'c_tel'); ?>
								<span class="error-tip none">请输入联系电话</span>
							</div>
						</div>
					</div>
					<div class="buttons clearfix">
						<a href="#" class="next-button left" id="registerButton2">下一步</a>
					</div>
					
				</div>
				<div class="right register-common-t">
					<span class="common-t-title">已有5884账号，请直接登陆</span>
					<span class="common-t-button">登陆</span>
				</div>
                    </div>
   <!---------------------------------------------------------------------------------注册第二部分----------------------------------------------->
                    <div class="register-one-content clearfix" id="register2">
				<div class="left content-left">
					<div>
						<span class="left-head">填写公司信息（保密，<span class="sign">*</span>必填）</span>
						<div class="form">
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'name'); ?>
                                                                <?php echo $form->textField($model,'name'); ?>
								<span class="error-tip">请输入公司名称</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'short'); ?>
                                                                <?php echo $form->textField($model,'short'); ?>
								<span class="error-tip none">请输入公司简称</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'url'); ?>
                                                                <?php echo $form->textField($model,'url',array('value'=>'http://')); ?>
								<span class="error-tip">请输入网址</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'address'); ?>
                                                                <?php echo $form->textField($model,'address'); ?>
								<span class="error-tip none">请输入公司地址</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'tel'); ?>
                                                                <?php echo $form->textField($model,'tel'); ?>
								<span class="error-tip none">请输入客服电话</span>
							</div>
							<div class="form-row">
								<label>&nbsp;所在城市：</label>
								<select>
									<option>北京</option>
									<option>北京</option>
									<option>北京</option>
									<option>北京</option>
									<option>北京</option>
								</select>省
								<select name="city">
									<option>北京</option>
									<option>北京</option>
									<option>北京</option>
									<option>北京</option>
									<option>北京</option>
								</select>市（<span class="sign">*</span>必填）
								<span class="error-tip none">请输入客户电话</span>
							</div>
							<div class="form-row">
								<label>&nbsp;公司LOGO：</label>
								<input type="file" name="logo_thumb"/>
								<span class="error-tip none">请输入客户电话</span>
							</div>
							<div class="form-row">
								<label>&nbsp;公司简介：</label>
								<textarea cols="50" rows="6" name="about_src"></textarea>
								<span class="error-tip none">请输入客户电话</span>
							</div>
						</div>
					</div>
					<div class="buttons clearfix">
						<a href="#" class="next-button left" id="registerButton1">上一步</a>
						<a href="#" class="next-button left" id="registerButton3">下一步</a>
					</div>
					
				</div>
				<div class="right register-common-t">
					<span class="common-t-title">已有5884账号，请直接登陆</span>
					<span class="common-t-button">登陆</span>
				</div>
			</div>
   <!---------------------------------------------------------------------------------注册第三部分----------------------------------------------->                  
                        <div class="register-one-content clearfix" id="register3">
				<div class="left content-left">
					<div>
						<span class="left-head">填写平台信息（保密，可选择填写）</span>
						<div class="form">
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'p_name'); ?>
                                                                <?php echo $form->textField($model,'p_name'); ?>
								<span class="error-tip">请输入公司名称</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'p_short'); ?>
                                                                <?php echo $form->textField($model,'p_short'); ?>
								<span class="error-tip">请输入公司名称</span>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'p_address'); ?>
                                                                <?php echo $form->textField($model,'p_address',array('value'=>'http://')); ?>
								<span class="error-tip">请输入公司名称</span>
							</div>
							<div class="form-row">
								<label>&nbsp;平台LOGO：</label>
								<input type="file" name="p_logo_thumb"/>
								<span class="error-tip none">请输入客户电话</span>
							</div>
							<div class="form-row">
								<label>&nbsp;平台简介：</label>
								<textarea cols="50" rows="6" name="brief" ></textarea>
								<span class="error-tip none">请输入客户电话</span>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'verifyCode'); ?>
								<?php echo $form->textField($model,'verifyCode',array('class'=>'verifyCode')); ?>
                                                                <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))); ?> 
								<span class="error-tip none">请输入客户电话</span>
							</div>
							<div class="form-checkbox rBox">
								<input type="checkbox"  class="aBox form-checkbox-con"/>
								<span class="form-checkbox-title">
                                                                    同意遵守<a href="#">注册协议</a>，注册后请联系客户审核账户。<a href="#"><img src=<?php echo Yii::app()->baseUrl."/images/login_register/QQ.jpg";?> /></a>
								</span>
							</div>	
						</div>
					</div>
					<div class="buttons clearfix">
						<a href="#" class="next-button left" id="registerSubmit">立即注册</a>
					</div>
				</div>
				<div class="right register-common-t">
					<span class="common-t-title">已有5884账号，请直接登陆</span>
					<span class="common-t-button">登陆</span>
				</div>
			</div>
		<?php $this->endWidget(); ?>
      
	</div>
        <script>
            register = {
                init : function (){
                        $("#registerSubmit").click(function (){
                            $("#registerform").submit();
                        });
                        register.step(1);
                        $("#registerButton1").click(function (){
                           register.step(1);
                        });
                        $("#registerButton2").click(function (){
                           register.step(2);
                        });
                        $("#registerButton3").click(function (){
                           register.step(3);
                        });
                },
                step : function (n){
                    for(var j = 1;j<= 3;j ++){
                        if(n == j) $("#register"+j).removeClass("none");
                        else  $("#register"+j).addClass("none");
                    }
                }
            }
            register.init();
        </script>