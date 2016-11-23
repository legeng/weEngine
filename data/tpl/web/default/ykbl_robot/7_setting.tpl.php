<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">

	<form action="" method="post" class="form-horizontal form">

		<h4>参数设置</h4>

		<table class="tb">

			<tr>

				<th>图灵API</th>

				<td>

					<input name="api" type="text" value="<?php  echo $settings['api'];?>" class="input-lg" placeholder="图灵API"/>

							<span class="help-block"><a target="_blank" href="http://www.tuling123.com/openapi/record.do?channel=32355">	

							请点击这里进入申请!（设置关键词触发进入聊天模式！）</a></span>

				</td>

		

			

			</tr>

		   <tr>

		  

	      <tr>

		  <th width="85">退出命令：</th>

		  

		  <td>

			<input name="close" type="text" value="<?php  echo $settings['close'];?>" class="input-lg" />

			<span class="help-block">这里是退出机器人的命令，注意：不能和触发关键字冲突。</span>

		  </td>

	      </tr>
              
              	      <tr>

		  <th width="85">欢迎语：</th>

		  

		  <td>

                      <textarea class="input-lg" name="welcom" ><?php  echo $settings['welcom'];?></textarea>

			<span class="help-block">当用户第一次触发进来的欢迎语。</span>

		  </td>

	      </tr>
                            	      <tr>

		  <th width="85">恭送语：</th>

		  

		  <td>

                      <textarea class="input-lg" name="out" ><?php  echo $settings['out'];?></textarea>

			<span class="help-block">当用户离开触发的恭送语。</span>

		  </td>

	      </tr>



			<tr>

				<th></th>

				<td>

					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

					<input name="submit" type="submit" value="保存" class="btn btn-primary span3" />

					

				</td>

			</tr>

		</table>

	</form>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>