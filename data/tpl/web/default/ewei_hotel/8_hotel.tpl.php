<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php  echo $this->createWebUrl('hotel',array('op'=>'list'));?>">酒店管理</a></li>
		<li><a href="<?php  echo $this->createWebUrl('hotel',array('op'=>'edit'));?>">添加酒店</a></li>
	</ul>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site" />
				<input type="hidden" name="a" value="entry" />
				<input type="hidden" name="m" value="ewei_hotel" />
				<input type="hidden" name="do" value="hotel" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">酒店</label>
					<div class="col-xs-12 col-sm-8 col-lg-9">
						<input class="form-control" name="keywords" id="" type="title" value="<?php  echo $_GPC['title'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">星级</label>
					<div class="col-xs-12 col-sm-8 col-lg-9">
						<select class='form-control' name='level'>
							<option value='' <?php  if(empty($_GPC['level'])) { ?>selected<?php  } ?>></option>
							<?php  if(is_array($hotel_level_config)) { foreach($hotel_level_config as $key => $value) { ?>
							<option value ="<?php  echo $key;?>" <?php  if($_GPC['level'] == $key) { ?>selected="selected"<?php  } ?>><?php  echo $value;?></option>
							<?php  } } ?>
						</select>
					</div>
					<div class=" col-xs-12 col-sm-2 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
						<button class="btn btn-default" name="export" value="export"><i class="fa fa-download"></i> 导出数据</button>
					</div>
				</div>
				<div class="form-group">
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
			<tr><th class='with-checkbox' style='width:30px;'>
				<input type="checkbox" class="check_all" /></th>
				<th style="width:120px;">酒店名称</th>
				<th style='width:100px;'>星级</th>
				<th style='width:100px;'>房间数</th>
				<th style='width:120px;'>电话</th>
				<th style='width:100px;'>状态</th>
				<th style="width:550px;">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<tr>  <td class="with-checkbox">
				<input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
				<td><?php  echo $item['title'];?></td>
				<td><?php  echo $item['level'];?></td>
				<td><?php  echo $item['roomcount'];?></td>
				<td><?php  echo $item['phone'];?></td>
				<td>
					<?php  if($item['status']==1) { ?>
					<span class='label label-success'>显示</span>
					<?php  } else { ?>
					<span class='label label-default'>隐藏</span>
					<?php  } ?>
				</td>
				<td>
					<a href="<?php  echo $this->createWebUrl('room_status',array('hotelid'=>$item['id']))?>" class="btn  btn-default btn-small" data-toggle="tooltip" data-placement="bottom" title="维护房量/房态">维护房量/房态</a>
					<a href="<?php  echo $this->createWebUrl('room_price',array('hotelid'=>$item['id']))?>" class="btn  btn-default btn-small" data-toggle="tooltip" data-placement="bottom" title="维护房价">维护房价</a>
					<a href="<?php  echo $this->createWebUrl('room',array('hotelid'=>$item['id']))?>" class="btn  btn-default btn-small" data-toggle="tooltip" data-placement="bottom"  title="房型管理">房型管理</a>
					<a href="<?php  echo $this->createWebUrl('order',array('hotelid'=>$item['id']))?>" class="btn  btn-default btn-small" data-toggle="tooltip" data-placement="bottom"  title="订单查看">订单查看</a>
					<a class="btn  btn-default btn-sm" rel="tooltip" href="<?php  echo $this->createWebUrl('hotel',array('op'=>'edit','id'=>$item['id']))?>" title="编辑" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-edit"></i></a>
					<?php  if($item['status']==0) { ?>
					<a class="btn btn-default btn-sm" title="显示" href="#" onclick="drop_confirm('您确定要显示此酒店吗?', '<?php  echo $this->createWebUrl('hotel',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-play"></i></a>
					<?php  } else if($item['status']==1) { ?>
					<a class="btn btn-default btn-sm" title="隐藏" href="#" onclick="drop_confirm('您确定要隐藏此酒店吗?', '<?php  echo $this->createWebUrl('hotel',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-stop"></i></a>
					<?php  } ?>
					<a class="btn btn-default" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('hotel',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-times"></i></a>
				</td>
			</tr>
			<?php  } } ?>
			<tr>
				<td colspan="7">
					<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
					<input type="button" class="btn btn-primary edit_all" name="showall" value="批量显示" />
					<input type="button" class="btn btn-primary edit_all" name="hideall" value="批量隐藏" />
				</td>
			</tr>
			</tbody>
			<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
		</table>
	</div>
	</div>
	<?php  echo $pager;?>
</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<script>
	$(function(){
		$(".check_all").click(function(){
			var checked = $(this).get(0).checked;
			$(':checkbox').each(function(){this.checked = checked});
		});
		$("input[name=deleteall]").click(function(){
			var check = $("input:checked");
			if(check.length<1){
				err('请选择要删除的记录!');
				return false;
			}
			if( confirm("确认要删除选择的记录?")){
				var id = new Array();
				check.each(function(i){
					id[i] = $(this).val();
				});
				$.post("<?php  echo $this->createWebUrl('hotel',array('op'=>'deleteall'))?>", {idArr:id},function(data){
					if (data.errno ==0)
					{
						location.reload();
					} else {
						alert(data.error);
					}
				},'json');
			}
		});

		$(".edit_all").click(function(){
			var name = $(this).attr('name');
			var check = $("input:checked");
			if(check.length<1){
				err('请选择要操作的记录!');
				return false;
			}

			var id = new Array();
			check.each(function(i){
				id[i] = $(this).val();
			});
			$.post("<?php  echo $this->createWebUrl('hotel',array('op'=>'showall'))?>", {idArr:id,show_name:name},function(data){
				if (data.errno ==0)
				{
					location.reload();
				} else {
					alert(data.error);
				}
			},'json');
		});
	});
</script>
<script>
	function drop_confirm(msg, url){
		if(confirm(msg)){
			window.location = url;
		}
	}
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
