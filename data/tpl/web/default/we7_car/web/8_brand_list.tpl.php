<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('brand',array('op'=>'post'));?>">添加汽车品牌</a></li>	
	<li  class="active"><a href="<?php  echo $this->createWebUrl('brand', array('op'=>'list'))?>">汽车品牌管理</a></li>	
</ul>
<div class="main panel panel-default">
	<div class="category panel-body table-responsive">
		<form action="" method="post">
 			<table class="table table-hover">
				<thead>
					<tr>
						<th>显示顺序</th>
						<th>品牌名称</th>
						<th>官网地址</th>
						<th>添加时间</th>
						<th>是否显示</th>
						<th style="width:150px;">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php  if(is_array($list)) { foreach($list as $v) { ?> 
                  	<tr>
						<td>
                        	<div class='col-sm-7'>
                             	<input type="text" class="form-control" name="listorder[<?php  echo $v['id'];?>]" value="<?php  echo $v['listorder'];?>">
                            </div>
                        </td>
	                    <td><?php  echo $v['title'];?></td>
	                    <td><a href="<?php  echo $v['officialweb'];?>" target="_blank"><?php  echo $v['officialweb'];?></a></td>
	                    <td><?php  echo date('Y-m-d H:i',$v['createtime'])?></td>
						<td><?php  if($v['status']=='1') { ?><span class="label label-success">显示</span><?php  } else { ?><span class="label label-danger">不显示</span><?php  } ?></td>
						<td style="text-align:left;">
							<a href="<?php  echo $this->createWebUrl('brand',array('id' => $v['id'],'op'=>'post'))?>" data-toggle="tooltip" data-placement="bottom" title="编辑" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
							<a href="<?php  echo $this->createWebUrl('brand', array('op'=>'del','id' => $v['id']))?>" onclick="return confirm('删除品牌将删除该品牌下的车系和车型，确认吗？');return false;" data-toggle="tooltip" data-placement="bottom" title="删除" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				<?php  } } ?>
				</tbody>
			</table>
			<table>
				<tr>
					<td>
                       	<a class='btn btn-default' href="<?php  echo $this->createWebUrl('Brand', array('op' => 'post','id'=>0))?>"><i class="fa fa-plus"></i> 添加汽车品牌</a>
						<button type="submit" class="btn btn-primary" name="submit" value="提交">提交排序</button>
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</td>
				</tr>
			</table>
		</form>
 		</div>
    </div>
<script>
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
