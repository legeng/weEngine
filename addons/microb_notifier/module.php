<?php
/**
 */
defined('IN_IA') or exit('Access Denied');

class Microb_NotifierModule extends WeModule {

    public function fieldsFormDisplay($rid = 0) {
        include $this->template('bridge');
    }

    public function fieldsFormValidate($rid = 0) {
        return '';
    }

    public function fieldsFormSubmit($rid = 0) {
        return true;
    }

    public function ruleDeleted($rid = 0) {
    }
}
