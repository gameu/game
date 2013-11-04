<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TagLibs
 *
 * @author Administrator
 */
class TagsAction extends CAction{
    //put your code here
//     private $tagOrigin = array();
     protected $tags = array();
//     protected $customTags = array();
     //替换标签所用
     protected $replaceTemp;
     protected $output;
     /**
      * 是否使用<n:link></n:link>标签
      * 
      */
     public $useLinkTag = true;
     /**
      * 是否使用<n:script></n:script>标签
      */
     public $useScriptTag = true;
     /**
      * 是否使用{$createUrl(game/test)}标签
      */
     public $useCreateUrl = true;
//     /**
//      * 是否使用<n:sidebar></n:sidebar>标签
//      */
//     public $useSidebar = true;

    
    public function __construct($controller, $id) { 
         parent::__construct($controller, $id);
         $this->setTags();
         $this->setCustomTags(array(
            'baseurl',
         ),'{$}');
     }
     
     public function replaceByTag($tag,$partialOutput){
//         echo $partialOutput; 
         return $this->output =  preg_replace($tag, $partialOutput, $this->output);
     }
     
     public function clearTag($tag,$output){
         return preg_replace($tag, '', $output);
     }
     
     protected function setTags(){
//         if($this->useSidebar) $this->tags['nsidebar'] = '/\<n\:sidebar\>(?<name>[^<]+)\<\/n\:sidebar\>/';
         if($this->useLinkTag) $this->tags['nlink'] = '/\<n\:link\>(?<name>[^<]+)\<\/n\:link\>/';
         if($this->useScriptTag) $this->tags['nscript'] = '/\<n\:script>(?<name>[^<]+)\<\/n\:script>/';
         if($this->useCreateUrl) $this->tags["createUrl"] = '/\{\$createUrl\(([^}]+)\)\}/';
     }
     
     /**
      * 自定义标签
      * @param array $array自定义标签数组
      * @param string $type标签模式类型
      *     <>为<n:type></n:type>类型
      *     </>为<n:type/>类型
      *     {$}为{$type}类型
      */
     public function setCustomTags($array=array(),$type="<>",$priority = false){
//         $tags = array();
         if($priority){
             $tags = $this->tags;
             $this->tags = array();
         }
         foreach ($array as $a){
             switch($type){
                 case "<>":
                     $this->tags[$a] = "/\<n\:{$a}\>(?<name>[^><]+)\<\/n\:{$a}\>/";
                 break;
                 case "[]":
                     $this->tags[$a] = "/\[n\:{$a}\](?<name>[^\[\]]+)\[\/n\:{$a}\]/";
                 break;
                 case "</>":
                     $this->tags[$a] = "/\<n\:{$a}>(?<name>[^<]+)\<\/n\:{$a}>/";
                 break;
                 case '{$}':
                     $this->tags[$a] = '/\{\$'.$a.'\}/';
                 break;
             }
         }
         if($priority){
             $this->tags = array_merge($this->tags,$tags);
         }
     }
     /***/
     public function runTags($output){
//         var_dump($this->tags);
         $this->output = $output;
         foreach ($this->tags as $key=>$t){
             $function = 'tag'.ucfirst($key);
             if(method_exists($this,$function)){
                $partialOutput = $this->$function();
                if($partialOutput)
                    $this->replaceByTag($t,$partialOutput);
             }
         }
         return $this->output;
     }
     /**
      * 获取匹配到的内容
      * @param string $tagName标签名
      */
     public function getTagContents($tagName){
         preg_match_all($this->tags[$tagName], $this->output, $match);
         return $match['name'];
     }
     
     public function tagBaseurl(){
        $baseUrl = Yii::app()->request->baseUrl;
        return $baseUrl;
     }
     /**
      * 相当于用{$createUrl(site/login)}标签替代Yii::app()->createUrl()
      */
     public function tagCreateUrl(){
         preg_match_all($this->tags['createUrl'], $this->output, $match);
         foreach($match[0] as $key=>$m){
             $partialOutput = Yii::app()->createUrl($match[1][$key]);
             $this->output = str_replace($m, $partialOutput, $this->output);
         }
     }
     
     public function tagNlink(){
         $output = $this->output;
         preg_match_all($this->tags['nlink'], $output, $match);
         $links = array();
         foreach($match['name'] as $m){
             $links = json_decode($m,true);
             $baseUrl = Yii::t("nan",$links['baseUrl'],array(
                '{baseUrl}'=>Yii::app()->baseUrl,
             ));
             foreach($links as $key=>$l){
                 switch ($key){
                     case "layout":
                         foreach($l as $layout){
                            $css =  $baseUrl.$layout.'.css';
                            Yii::app()->clientScript->registerCssFile($css);
                         }
                     break;
                     case "action":
                         foreach($l as $a_key=>$action){
                            if(in_array($this->id, $action)){
                                $css =  $baseUrl.$a_key.'.css';
                                Yii::app()->clientScript->registerCssFile($css);
                            }
                         }
                     break;
                     case "base":
                        if($l=="all"){
                            $css = "/style/css/base.css";
                            Yii::app()->clientScript->registerCssFile($css);
                        }else{
                            if(in_array($this->id, $l)){
                                $css = "/style/css/base.css";
                                Yii::app()->clientScript->registerCssFile($css);
                            }
                        }
                     break;
                     case "bootstrap":
                        if($l=="all"){
                            $css = "/style/css/$key/bootstrap.min.css";
                            Yii::app()->clientScript->registerCssFile($css);
                        }else{
                            if(in_array($this->id, $l)){
                                $css = "/style/css/$key/bootstrap.min.css";
                                Yii::app()->clientScript->registerCssFile($css);
                            }
                        }
                     break;
                     case "validform":
                        if($l=="all"){
                            $css = "/style/css/$key/validate.css";
                            Yii::app()->clientScript->registerCssFile($css);
                        }else{
                            if(in_array($this->id, $l)){
                                $css = "/style/css/$key/validate.css";
                                Yii::app()->clientScript->registerCssFile($css);
                            }
                        }
                     break;
                }
           }
        }
        $this->output = $this->clearTag($this->tags['nlink'],$output);
        return false;
     }
     
     public function tagNscript(){
         $output = $this->output;
         preg_match_all($this->tags['nscript'], $output, $match);
         $links = array();
         foreach($match['name'] as $m){
             $links = json_decode($m,true);
             $baseUrl = Yii::t("nan",$links['baseUrl'],array(
                '{baseUrl}'=>Yii::app()->baseUrl,
             ));
             foreach($links as $key=>$l){
                 switch ($key){
                     case "layout":
                         foreach($l as $layout){
                            $js =  $baseUrl.$layout.'.js';
                            Yii::app()->clientScript->registerScriptFile($js);
                         }
                     break;
                     case "action":
                         foreach($l as $a_key=>$action){
                            if(in_array($this->id, $action)){
                                $js =  $baseUrl.$a_key.'.js';
                                Yii::app()->clientScript->registerScriptFile($js);
                            }
                         }
                     break;
                     case "jquery":
                         Yii::app()->ClientScript->registerCoreScript('jquery');
                     break;
                     case "seajs":
                        if($l=="all"){
                            $js = "/style/js/sea.js";
                            Yii::app()->clientScript->registerCssFile($js);
                        }else{
                            if(in_array($this->id, $l)){
                                $js = "/style/js/sea.js";
                                Yii::app()->clientScript->registerCssFile($js);
                            }
                        }
                     break;
                }
           }
        }
        $this->output = $this->clearTag($this->tags['nscript'],$output);
        return false;
     }
}

?>
