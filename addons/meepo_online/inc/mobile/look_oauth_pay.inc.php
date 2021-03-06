<?php
global $_W,$_GPC;
$weid = $_W['uniacid'];
$openid = $_GPC['topenid'];
$listid = intval($_GPC['listid']);
if(empty($openid) || empty($listid)){
	message('参数错误！');
}
$list = pdo_fetch("SELECT * FROM ".tablename($this->list_table)." WHERE weid=:weid AND   id=:id",array(':weid'=>$weid,':id'=>$listid));
$categoryid = intval($list['categoryid']);
if(empty($list)){
	message('直播不存在或是已经被删除！',$this->createMobileUrl('index'),'error');
}
$user = pdo_fetch("SELECT * FROM ".tablename($this->list_user_table)." WHERE openid = :openid AND weid=:weid AND listid=:listid",array(':openid' =>$openid,':weid' =>$weid,':listid'=>$listid));
if(empty($user)){
	message('你的信息不存在或是已经被删除！');
}
$oauth_account = pdo_fetchcolumn("SELECT `uniacid` FROM " . tablename('account_wechats') . " WHERE acid = :acid ", array(':acid' =>$_W['oauth_account']['acid']));
$wechat_pay = uni_setting($oauth_account, array('payment'));
if(!$wechat_pay['payment']['wechat']['switch'] || empty($wechat_pay['payment']['wechat']['mchid'])){
	message('需要借用具备支付权限的认证服务号！');
}
load()->model('mc');
$oauth_info = mc_oauth_userinfo();
if (!is_error($oauth_info) && !empty($oauth_info) && is_array($oauth_info)) {
		$oauth_openid = $oauth_info['openid'];
		pdo_update($this->list_user_table,array('oauth_openid'=>$oauth_openid),array('id'=>$user['id'],'listid'=>$listid));
		$user['oauth_openid'] = $oauth_openid;
}else{
		message("借用oauth失败");
}
include $this->template('look_oauth_pay');