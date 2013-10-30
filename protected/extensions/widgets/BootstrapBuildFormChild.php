<?php

/**
 * bootstrap 根据数据字段类型表单元素自动匹配，并循环输出所有根据可有的字段
 */
class BootstrapBuildFormChild extends Cwidget {

    protected $attributesWidgets;
    protected $required;
    
    public $redactorUpload = true;
    public $name = 'application';
    public $textField_span = 'span6';
    /**
     * 表单控件
     */
    public $form;
    public $model;
    public $attribute;
    

    public function init() {
        // 此方法会被 CController::beginWidget() 调用
        $this->createWidget($this->form, $this->model, $this->attribute);
    }

    public function run() {
        // 此方法会被 CController::endWidget() 调用
    }

    /**
     * Get attribute options.
     *
     * @param string $attribute Model attribute
     * @param array $options Model attribute form options
     * @param bool $recursive Merge option arrays recursively
     * @return array
     */
    protected function getAttributeOptions($attribute, $options=array(), $recursive=false) {
        $optionsName = (string) $attribute . 'Options';
        if (isset($this->attributesWidgets->$optionsName)) {
            $attributeOptions = array_slice($this->attributesWidgets->$optionsName, 2);
            if (empty($options)) {
                return $attributeOptions;
            } else {
                if (empty($attributeOptions)) {
                    return $options;
                } else {
                    if ($recursive === true) {
                        return array_merge_recursive($options, $attributeOptions);
                    } else {
                        return array_merge($options, $attributeOptions);
                    }
                }
            }
        } else {
            if (empty($options)) {
                return array();
            } else {
                return $options;
            }
        }
    }

    /**
     * Get attributes widget.
     *
     * @param object $model Model
     * @param string $attribute Model attribute
     * @return null|object
     */
    public function getAttributeWidget($model, $attribute) {
        if ($this->attributesWidgets !== null) {
            if (isset($this->attributesWidgets->$attribute)) {
                return $this->attributesWidgets->$attribute;
            } else {
                $fieldType = $model->fieldType();
                $dbType = $fieldType[$attribute];
                switch($dbType){
                    case 'select':
                        echo 'sfddsf';
                         return 'select';
                    break;
                    case 'text':
                         return 'wysiwyg';
                    break;
                    case 'longtext':
                         return 'textArea';
                    break;
                    case 'time':
                         return 'time';
                    break;
                    case 'datetime':
                         return 'datetime';
                    case 'date':
                         return 'date';    
                    break;
                    case 'email':
                         return 'email';
                    break;
                    case 'tel':
                         return 'tel';
                    break;
                    case 'qq':
                         return 'qq';
                    break;
                    case 'select':
                         return 'select';
                    break;
                    case 'file':
                         return 'file';
                    break;
                    case 'image':
                         return 'image';
                    break;
                    case 'chosen':
                         return 'chosen';
                    case 'chosenMultiple':
                         return 'chosenMultiple';     
                    break;
                    case 'checkbox':
                         return 'checkbox';
                    break;
                    case 'url':
                         return 'url';
                    break;
                    case 'city':
                         return 'city';
                    break;
                    default:
                    return 'textField'; 
                }
               
            }
        }

        $attributeWidgets = array();
        if (method_exists($model, 'attributeWidgets')) {
            $attributeWidgets = $model->attributeWidgets();
        }

        $data = array();
        if (!empty($attributeWidgets)) {
            foreach ($attributeWidgets as $item) {
                if (isset($item[0]) && isset($item[1])) {
                    $data[$item[0]] = $item[1];
                    $data[$item[0] . 'Options'] = $item;
                }
            }
        }

        $this->attributesWidgets = (object) $data;

        return $this->getAttributeWidget($model, $attribute);
    }
    /**
     * Get an array of attribute choice values.
     * The variable or method name needs ​​to be: attributeChoices.
     *
     * @param object $model Model
     * @param string $attribute Model attribute
     * @return array
     */
    private function getAttributeChoices($model,$attribute){
            $data=array();
            $choicesName=(string)$attribute.'Choices';
            if (method_exists($model,$choicesName) && is_array($model->$choicesName())) {
                    $data=$model->$choicesName();
            } else if (isset($model->$choicesName) && is_array($model->$choicesName)) {
                    $data=$model->$choicesName;
            }
            return $data;
    }
    /**
     * 实现validform插件选项绑定
     * 
     * @param string model属性 字段名
     * @param string $type valiform验证类型
     * @param array $options 需要合并的数组
     */
    public function getValidFormOptions ($attribute,$type='*',$options){
        $validform_options = array();
        if(in_array($attribute,$this->required))
            $validform_options = array(
                'nullmsg' =>$options['placeholder'],
                'datatype' =>'*',
            );
       
        return array_merge($validform_options,$options);
    }

    /**
     * 自动识别字段类型并绑定相关类型表单元素
     *
     * @param TbActiveForm TbActiveForm对象，bootstrap widget
     * @param object $model Model
     * @param string $attribute Model attribute
     */
    public function createWidget($form, $model, $attribute) {
        $lang = Yii::app()->language;
        if ($lang == 'en_us') {
            $lang = 'en';
        }

        $widget = $this->getAttributeWidget($model, $attribute);
        $label = $model->getAttributeLabel($attribute);
        $this->required = $model->validators[0]->attributes;
        switch ($widget) {
            case 'select':
                echo 'sdf';
                break;
            case 'time':
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="controls">';
                } else {
                    echo $form->labelEx($model, $attribute);
                }
                echo '<div class="input-prepend"><span class="add-on"><i class="icon-time"></i></span>';
                $options = array(
                    'model' => $model,
                    'attribute' => $attribute,
                    'language' => $lang,
                    'mode' => 'time',
                    'htmlOptions' => array(
                        'class' => 'size-medium',
                    ),
                    'options' => array(
                        'timeFormat' => 'hh:mm:ss',
                        'showSecond' => true,
                    ),
                );
                $options = $this->getAttributeOptions($attribute, $options);
                $this->controller->widget('ext.jui.EJuiDateTimePicker', $options);
                echo '</div>';
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'datetime':
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="controls">';
                } else {
                    echo $form->labelEx($model, $attribute);
                }
                echo '<div class="input-prepend"><span class="add-on"><i class="icon-calendar"></i></span>';
                $options = array(
                    'model' => $model,
                    'attribute' => $attribute,
                    'language' => $lang,
                    'mode' => 'datetime',
                    'htmlOptions' => array(
                        'class' => 'size-medium',
                    ),
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'timeFormat' => 'hh:mm:ss',
                        'showSecond' => true,
                    //'stepHour'=>'1',
                    //'stepMinute'=>'10',
                    //'stepSecond'=>'60',
                    ),
                );
                $options = $this->getAttributeOptions($attribute, $options);
                $this->controller->widget('ext.jui.EJuiDateTimePicker', $options);
                echo '</div>';
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'date':
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    if($form->type!='inline')
                        echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="controls">';
                } else {
                    if($form->type!='inline')
                        echo $form->labelEx($model, $attribute);
                }
                echo '<div class="input-prepend mr5 " style=""><span class="add-on"><i class="icon-calendar"></i></span>';
                $htmlOptions = array(
                    'class' => 'size-medium span2',
                    'placeholder' =>'请输入'. $label,
                );
                $htmlOptions = $this->getValidFormOptions($attribute, '*',$htmlOptions);
                $options = array(
                    'model' => $model,
                    'attribute' => $attribute,
                    'language' => $lang,
                    
                    'mode' => 'date',
                    'htmlOptions' => $htmlOptions,
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                    ),
                );
                $options = $this->getAttributeOptions($attribute, $options);
                $this->controller->widget('ext.jui.EJuiDateTimePicker', $options);
                echo '</div>';
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'wysiwyg':
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="controls">';
                } else {
                    echo $form->labelEx($model, $attribute);
                }
                $options = array(
                    'model' => $model,
                    'attribute' => $attribute,
                    'options' => array(
                        'lang' => 'zh_cn',
                        'buttons' => array(
                            'formatting', '|', 'bold', 'italic', 'deleted', '|',
                            'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
                             'link', '|', 'html',
                        ),
                    ),
                );
                $options = $this->getAttributeOptions($attribute, $options);
                if ($this->redactorUpload === true) {
                    $redactorOptions = array(
                        'options' => array(
                            'imageUpload' => Yii::app()->createUrl($this->controller->id . '/redactorImageUpload', array(
                                'name' => get_class($model),
                                'attr' => $attribute)
                            ),
                            'imageGetJson' => Yii::app()->createUrl($this->controller->id . '/redactorImageList', array(
                                'name' => get_class($model),
                                'attr' => $attribute)
                            ),
                            'imageUploadErrorCallback' => new CJavaScriptExpression(
                                    'function(obj,json) { alert(json.error); }'
                            ),
                        ),
                    );
                    $options = array_merge_recursive($options, $redactorOptions);
                }
                $this->controller->widget('ext.redactor.ERedactorWidget', $options);
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'textArea':
                $options = array(
                    'rows' => 5,
                    'cols' => 50,
                    'class' => 'span8',
                    'placeholder' =>'请输入'. $label,
                );
                $options = $this->getValidFormOptions($attribute,'*',$options);
                $options = $this->getAttributeOptions($attribute, $options);
                echo $form->textAreaRow($model, $attribute, $options);
               
                break;

            case 'textField':
                $options = array(
                    'placeholder' =>'请输入'. $label,
                    'class' => $this->textField_span,
                );
                $options = $this->getValidFormOptions($attribute,'*',$options);
                
                $options = $this->getAttributeOptions($attribute, $options);
//                echo $form->textField($model, $attribute, $options);
                 
                echo $form->textFieldRow($model, $attribute, $options);
                break;
            case 'email':
                $options = array(
                    'class' => 'span6',
                    'placeholder' =>'请输入'. $label,
                );
                $options = $this->getValidFormOptions($attribute,'e',$options);
                $options = $this->getAttributeOptions($attribute, $options);
//                echo $form->textField($model, $attribute, $options);
                 
                echo $form->textFieldRow($model, $attribute, $options);
                break;
            case 'url':
                $label = $model->getAttributeLabel($attribute);
                $options = array(
                    'class' => 'span6',
                    'placeholder' =>'请输入'. $label,
                );
                $options = $this->getValidFormOptions($attribute,'url',$options);
                $options = $this->getAttributeOptions($attribute, $options);
//                echo $form->textField($model, $attribute, $options);
                 
                echo $form->textFieldRow($model, $attribute, $options);
                break;
            case 'tel':
                $options = array(
                    'class' => 'span6',
                    'placeholder' =>'0668-2669437 或 15019363446',
                    'nullmsg' =>'请输入'.$label,
                    'errormsg' =>'请输入正确的电话或手机格式',
                );
                $options = $this->getValidFormOptions($attribute,'phone',$options);
                $options = $this->getAttributeOptions($attribute, $options);
//                echo $form->textField($model, $attribute, $options);
                 
                echo $form->textFieldRow($model, $attribute, $options);
                break;
            case 'qq':
                $options = array(
                    'class' => 'span6',
                    'placeholder' =>'请输入'. $label,
                    'errormsg' =>'请输入正确QQ号码',
                );
                $options = $this->getValidFormOptions($attribute,'qq',$options);
                $options = $this->getAttributeOptions($attribute, $options);
//                echo $form->textField($model, $attribute, $options);
                 
                echo $form->textFieldRow($model, $attribute, $options);
                break;
            case 'chosen':
                $options = $model->chosen();
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    if($form->type!='inline')
                        echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="" style="margin-left:214px">';
                } else {
                    if($form->type!='inline')
                       echo $form->labelEx($model, $attribute);
                }
//                $this->controller->widget('ext.chosen.Chosen',array(
//                   'name' => get_class($model)."[{$attribute}]", // input name
//                   'htmlOptions' => array(
//                       'class'=>'span3',
//                        'placeholder' =>'请输入'. $label,
//                        'nullmsg' =>'请输入'. $label,
//                        'datatype' =>'*',
//                   ), // selection
//                   'data' => $options[$attribute],
//                ));
                echo $form->dropDownList($model,$attribute,$options[$attribute],array(
                    'class'=>'span2 mr5'
                ));
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;
            case 'city':
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group" id="'. get_class($model).'_'.$attribute .'">';
                    if($form->type!='inline')
                        echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="" style="margin-left:214px">';
                } else {
                    if($form->type!='inline')
                       echo $form->labelEx($model, $attribute);
                }
                $chosen = $model->chosen();
                $class = 'span2 mr5';
                $place = explode('-',$model[$attribute]);
                if(!isset($model[$attribute])) $place = $chosen['city'];
                if(isset($chosen['city'][0]))
                    echo $form->dropDownList($model,$attribute,array($place[0]=>$place[0]),array(
                        'class'=>$class,
                        'id'=>'province',
                    ));
//                var_dump($place);
//                return;
                if(isset($chosen['city'][1]))
                   echo CHtml::dropDownList(
                        get_class($model)."[{$attribute}1]", 
                        'sdf',
                        array(
                           $place[1]=>$place[1],
                        ),
                        array(
                           'class'=>$class,
                            'id'=>'city',
                        )

                    );
                if(isset($chosen['city'][2]))
                    echo CHtml::dropDownList(
                        get_class($model)."[{$attribute}1]", 
                        'sdf',
                        array(
                           $place[2]=>$place[2],
                        ),
                        array(
                           'class'=>$class,
                            'id'=>'city',
                        )

                    );
                    if(!isset($place[2])) $place[2] = '';
$js=<<<EOD
              seajs.use('other/jquery/jquery.city',function(){
                 $("body").jQueryCity({
                    selectId : {
                        province : "province",
                        city : "city" ,
                        area : "area"
                    },
                    defaults : {
                        province : "$place[0]" ,
                        city : "$place[1]" ,
                        area : "$place[2]"
                    }
                })
            });
EOD;
                Yii::app()->clientScript->registerScript('city',"
                    $js
                ",CClientScript::POS_END);  
//                if(isset($place[1]))
//                 echo $form->dropDownList($model,$attribute,array($place[1]=>$place[1]),$htmlOptions);
//                if(isset($place[2]))
//                 echo $form->dropDownList($model,$attribute,array($place[2]=>$place[2]),$htmlOptions);
//                
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'chosenMultiple':
                $options = $model->chosen();
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    if($form->type!='inline')
                        echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="" style="margin-left:214px">';
                } else {
                    if($form->type!='inline')
                       echo $form->labelEx($model, $attribute);
                }
                $this->controller->widget('ext.chosen.Chosen',array(
                   'name' => get_class($model)."[{$attribute}]", // input name
                   'htmlOptions' => array(
                       'class'=>'span6',
                       'multiple'=>true,
                        'data-placeholder' =>'请输入'. $label.'（如果太多可以搜素:-)',
                   ), // selection
                   'data' => $options[$attribute],
                ));
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'taggable':
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="controls">';
                } else {
                    echo $form->labelEx($model, $attribute);
                }
                $options = array(
                    'name' => $attribute,
                    'value' => $model->$attribute->toString(),
                    'url' => Yii::app()->createUrl($this->name . '/model/suggestTags', array(
                        'name' => get_class($model),
                        'attr' => $attribute,
                    )),
                    'multiple' => true,
                    'mustMatch' => false,
                    'matchCase' => false,
                    'htmlOptions' => array(
                        'size' => 50,
                        'class' => 'span5',
                    ),
                );
                $options = $this->getAttributeOptions($attribute, $options);
                $this->controller->widget('CAutoComplete', $options);
                echo '<span class="help-inline">' . Yii::t('YcmModule.ycm', 'Separate words with commas.') . '</span>';
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'dropDown':
                $options = array(
                    'empty' => Yii::t('YcmModule.ycm', 'Choose {name}', array('{name}' => $model->getAttributeLabel($attribute))
                    ),
                    'class' => 'span5',
                );
                $options = $this->getAttributeOptions($attribute, $options);
                echo $form->dropDownListRow($model, $attribute, $this->getAttributeChoices($model, $attribute), $options);
                break;

            case 'typeHead':
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '<div class="control-group">';
                    echo $form->labelEx($model, $attribute, array('class' => 'control-label'));
                    echo '<div class="controls">';
                } else {
                    echo $form->labelEx($model, $attribute);
                }
                $options = array(
                    'model' => $model,
                    'attribute' => $attribute,
                    'htmlOptions' => array(
                        'class' => 'span5',
                        'autocomplete' => 'off',
                    ),
                    'options' => array(
                        'name' => 'typeahead',
                        'source' => $this->getAttributeChoices($model, $attribute),
                        'matcher' => "js:function(item) {
							return ~item.toLowerCase().indexOf(this.query.toLowerCase());
						}",
                    ),
                );
                $options = $this->getAttributeOptions($attribute, $options, true);
                $this->controller->widget('bootstrap.widgets.TbTypeahead', $options);
                echo $form->error($model, $attribute);
                if ($form->type == TbActiveForm::TYPE_HORIZONTAL) {
                    echo '</div></div>';
                }
                break;

            case 'radioButton':
                $options = array();
                $options = $this->getAttributeOptions($attribute, $options);
                echo $form->radioButtonListRow($model, $attribute, $this->getAttributeChoices($model, $attribute), $options);
                break;

            case 'boolean':
                $options = array();
                $options = $this->getAttributeOptions($attribute, $options);
                echo $form->checkboxRow($model, $attribute, $options);
                break;

            case 'password':
                $options = array(
                    'class' => 'span5',
                );
                $options = $this->getAttributeOptions($attribute, $options);
                echo $form->passwordFieldRow($model, $attribute, $options);
                break;

            case 'disabled':
                $options = array(
                    'class' => 'span5',
                    'disabled' => true,
                );
                $options = $this->getAttributeOptions($attribute, $options);
                echo $form->textFieldRow($model, $attribute, $options);
                break;

            case 'file':
                $options = array(
                    'class' => 'span2',
                    'size' => 3,
                );
                $options = $this->getAttributeOptions($attribute, $options);
                /*if (!$model->isNewRecord && !empty($model->$attribute)) {
                    ob_start();
                    echo '<p>';
                    $this->controller->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('YcmModule.ycm', 'Download'),
                        'type' => '',
                        'url' => $model->getFileUrl($attribute),
                    ));
                    echo '</p>';
                    $html = ob_get_clean();
                    $options['hint'] = $html;
                }*/
                echo $form->fileFieldRow($model, $attribute, $options);
                break;

            case 'image':
                $options = array(
                    'class' => 'span6',
                    'placeholder' => '请选择图片',
                );
                $options = $this->getValidFormOptions($attribute,'*',$options);
                $options = $this->getAttributeOptions($attribute, $options);
                
                /*if (!$model->isNewRecord && !empty($model->$attribute)) {
                    $modalName = 'modal-image-' . $attribute;
                    $image = CHtml::image($model->getFileUrl($attribute), Yii::t('YcmModule.ycm', 'Image'), array(
                                'class' => 'modal-image')
                    );
                    ob_start();
                    $this->controller->beginWidget('bootstrap.widgets.TbModal', array('id' => $modalName));
                    echo '<div class="modal-header"><a class="close" data-dismiss="modal">&times;</a><h4>';
                    echo Yii::t('YcmModule.ycm', 'Image preview') . '</h4></div>';
                    echo '<div class="modal-body">' . $image . '</div>';
                    $this->controller->endWidget();
                    
                    echo '<p>';
                    $this->controller->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('YcmModule.ycm', 'Preview'),
                        'type' => '',
                        'htmlOptions' => array(
                            'data-toggle' => 'modal',
                            'data-target' => '#' . $modalName,
                        ),
                    ));
                    echo '</p>';
                    $html = ob_get_clean();
                    $options['hint'] = $html;
                }*/
                echo $form->fileFieldRow($model, $attribute, $options);
                echo "<div class='mb15 controls'>图片大小规格：</div>";
                break;

            case 'hide':
                break;

            default:
                $options = array(
                    'class' => 'span5',
                );
                $options = $this->getAttributeOptions($attribute, $options);
                echo $form->textFieldRow($model, $attribute, $options);
                break;
        }
    }

}
