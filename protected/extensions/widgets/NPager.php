<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NPager
 *
 * @author Administrator
 */
Yii::import('bootstrap.widgets.TbPager');
class NPager extends TbPager{
    public $innerBtnAddHref = 'sdfdsf';
    //put your code here
    protected function createPageButton($label, $page, $class, $hidden, $selected){
        if ($hidden || $selected)
                $class .= ' '.($hidden ? 'disabled' : 'active');
        $url = $this->controller->id . '/' . $this->controller->action->id;
//        return CHtml::tag('li', array('class'=>$class), CHtml::link($label, Yii::app()->createUrl($url,array(
//            ucfirst($this->controller->id) . '_page'=>$page+1,
//            'isAjax'=>$this->innerBtnAddHref,
//        ))));
        return CHtml::tag('li', array('class'=>$class), CHtml::link($label, $this->createPageUrl($page)));
    }
}

?>
