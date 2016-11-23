<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
        <li <?php  if($op == 'list') { ?>class="active" <?php  } ?>>
            <a href="<?php  echo $this->createWebUrl('region', array('op' => 'list'));?>">小区管理</a>
        </li>
        <li>
            <a href="<?php  echo $this->createWebUrl('region', array('op' => 'add'));?>">新增小区</a>
        </li>
        
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger">*</span> 地址</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php  echo tpl_form_field_district('reside',array('province' => $reside['province'],'city' => $reside['city'],'district' => $reside['district']));?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 control-label">小区名称</label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                        <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="pull-right col-xs-12 col-sm-2 col-md-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="padding:15px;">
        <table class="table table-hover table-condensed">
            <thead class="navbar-inner">
                <tr>
                    <th class='col-md-2'>小区名称</th>
                    <th>物业</th>
                    <th class='col-md-1'>联系人</th>
                    <th class='col-md-2'>联系电话</th>
                    <th>地址</th>
                    <th class='col-md-2'>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['rtitle'];?></td>
                    <td><?php  echo $item['ptitle'];?></td>
                    <td><?php  echo $item['linkmen'];?></td>
                    <td><?php  echo $item['linkway'];?></td>
                    <td><?php  echo $item['city'];?><?php  echo $item['dist'];?><?php  echo $item['address'];?></td>
                    <td>
                        <!-- <a  href="<?php  echo $this->createWebUrl('region',array('op' => 'room','id' => $item['id']))?>" title="" data-toggle="tooltip" data-placement="top" class="btn btn-default btn-sm" ><i class="glyphicon glyphicon-plus"></i>导入房号</a> -->
                        
                        <a href="<?php  echo $this->createWebUrl('region',array('op' => 'add','id' => $item['id']))?>" title="编辑" class="btn btn-default btn-sm" ><i class="fa fa-edit" data-toggle="tooltip" data-placement="top"></i>编辑</a> 
                        
                        <a onclick="return confirm('删除小区，将要删除该小区下所有的小区用户，此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('region',array('op' => 'delete','id' => $item['id']))?>" title="删除" data-toggle="tooltip" data-placement="top" class="btn btn-default btn-sm" data-original-title="删除"><i class="fa fa-times"></i>删除</a>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>