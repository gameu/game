<?php
/**
 * This is the model class for table "{{pinfo}}".
 *
 * The followings are the available columns in table '{{pinfo}}':
 * @property integer $id
 * @property string $name
 * @property string $typeo
 * @property string $initial
 * @property integer $examine
 * @property string $system
 * @property string $relative
 * @property string $cCompany
 * @property string $rCompany
 * @property string $site
 * @property string $downaddress
 * @property string $platform
 * @property string $typet
 * @property string $theme
 * @property string $ul
 * @property string $fightform
 * @property string $gstate
 * @property string $chargingMode
 * @property string $address
 * @property string $img
 * @property string $created
 * @property string $position
 */
class Game extends NFileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{game}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, typeo,cCompany, rCompany,site,typet, theme,ul,fightform, gstate', 'required'),
			array('name, typeo, system, cCompany, rCompany, platform', 'length', 'max'=>50),
			array('relative, site, downaddress, address, img', 'length', 'max'=>100),
			array('typet, theme, ul, fightform, gstate, chargingMode', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        array('id, name, typeo, initial, examine, system, relative, cCompany, rCompany, site, downaddress, platform, typet, theme, ul, fightform, gstate, chargingMode, address, img, created', 'safe', 'on'=>'search'),
		);
	}
        
        public function fieldType() {
            return array(
                    'name' => 'varchar',
                    'typeo' => 'chosenMultiple',
                    'system' => 'chosen',
                    'relative' => 'chosenMultiple',
                    'cCompany' => 'varchar',
                    'rCompany' => 'varchar',
                    'site' => 'url',
                    'downaddress' => 'varchar',
                    'platform' => 'varchar',
                    'typet' => 'chosen',
                    'theme' => 'chosenMultiple',
                    'ul' => 'chosen',
                    'fightform' => 'chosen',
                    'gstate' => 'chosen',
                    'chargingMode' => 'chosen',
                    'address' => 'varchar',
                    'img' => 'image',
                    'created'=>'date',
                    'examine'=>'chosen',
                    'p_id'=>'chosen',
                    'position'=>'chosenMultiple',
                    'registerAddress'=>'varchar',
                    'estimate'=>'varchar',
                    'logo'=>'image',
            );
        }
        
        public function chosen(){
            $arr = array(
                'position'=>array(
                    '推荐游戏 '
                ),
                'p_id'=>array(
                    '平台 '
                ),
                'logo' => array(
                    'width'=>'120',
                    'height'=>'90',
                    'scale'=>'2',
                ),
                'img' => array(
                    'width'=>'660',
                    'height'=>'260',
                    'scale'=>'2',
                ),
                'typeo' => array(
                    '网页'=>'网页游戏 ',
                    '客户端'=>'客户端游戏',
                    '手机'=>'手机游戏',
                ),
                'system' => array(
                    'PC端'=>'PC端',
                    '安卓'=>'安卓 ',
                    '苹果'=>'苹果 ',
                    'WP'=>'WP',
                    '塞班'=>'塞班',
                    '塞班'=>'塞班 ',
                ),
               'relative' => array(
                    'iphone'=>'iphone ',
                    'iPad'=>'iPad ',
                    'Android'=>'Android ',
                    'aPad'=>'aPad ',
                    '微端aPad'=>'微端aPad',
                    '其他'=>'其他',
                ),
                'typet' => array(
                    '角色扮演'=>'角色扮演',
                    '战阵策略'=>'战阵策略',
                    '模拟经营'=>'模拟经营',
                    '益智休闲'=>'益智休闲',
                    '运动竞技'=>'运动竞技',
                    '其他类型'=>'其他类型',
                ),
                
                
                'theme' => array(
                    '音乐'=>'音乐 ',
                    '武侠'=>'武侠 ',
                    '科幻'=>'科幻 ',
                    '三国'=>'三国 ',
                    '西游'=>'西游 ',
                    '战争'=>'战争 ',
                    '魔幻'=>'魔幻  ',
                    '动漫'=>'动漫  ',
                    '历史'=>'历史  ',
                    '射击'=>'射击  ',
                    '体育'=>'体育  ',
                    '棋牌'=>'棋牌  ',
                    '竞速'=>'竞速  ',
                    '商业'=>'商业  ',
                    '儿童'=>'儿童  ',
                    '格斗'=>'格斗',
                    '修真'=>'修真   ',
                    '航海'=>'航海',
                    '玄幻'=>'玄幻 ',
                    '玄幻'=>'仙侠',
                    '其他'=>'其他',
                ),
                 'ul' => array(
                    '2D'=>'2D',
                    '2.5D'=>'2.5D',
                    '3D'=>'3D',
                    '横版'=>'横版',
                    '其他'=>'其他',
                ),
                'fightform' => array(
                    '回合'=>'回合',
                    '战棋'=>'战棋',
                    '文字'=>'文字',
                    '半即时'=>'半即时',
                    '卡牌'=>'卡牌',
                    '自动'=>'自动',
                    '其他'=>'其他',
                ),
                'gstate' => array(
                    ''=>'请选择游戏状态',
                    '封测'=>'封测',
                    '内测'=>'内测',
                    '公测'=>'公测',
                    '测试'=>'测试',
                    '研发中'=>'研发中',
                ),
                'chargingMode' => array(
                    '道具收费'=>'道具收费',
                    '时长收费'=>'时长收费',
                    '下载收费'=>'下载收费',
                    '完全免费'=>'完全免费',
                ),
                 'examine' => array(
                    ''=>'请选择审核状态',
                    '0'=>'不通过',
                    '1'=>'通过',
                ),
            );
            $re = array_merge($arr,$this->chosen);
            return $re;
        }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                     
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			 'name'=>'游戏名称',
                         'created'=>'入库时间',
                        'typeo' => '游戏端类型',
                        'system' => '操作系统',
                        'relative' => '平台互通',
                        'cCompany' => '研发公司',
                        'rCompany' => '运营公司',
                        'site' => '官方网站',
                        'downaddress' => '下载地址',
                        'platform' => '官方论坛',
                        'typet' => '游戏类型',
                        'theme' => '游戏题材',
                        'ul' => '游戏界面',
                        'fightform' => '战斗场景',
                        'gstate' => '游戏状态',
                        'chargingMode' => '充值模式',
                        'address' => '所在地区',
                        'img' => '入库图片',
                         'examine'=>'审核状态',
                         'm_id'=>'选择厂商',
                        'p_id'=>'所属平台',
                        'position'=>'推荐位置',
                        'registerAddress'=>'注册地址',
                        'estimate'=>'游戏评分',
                        'logo'=>'游戏logo',
		);
	}
        public function attributeAddLabels() {
            return array(
//              'created'=>'入库时间',
                'name' => 'name',
                'typeo' => 'Typeo',
                'position'=>'position',
               // 'system' => 'System',
//                'relative' => 'Relative',
                'cCompany' => 'C Company',
                'rCompany' => 'R Company',
                'site' => 'Site',
                 'platform' => 'Platform',
                'registerAddress'=>'registerAddress',
                'downaddress' => 'Downaddress',
                'typet' => 'Typet',
                'theme' => 'Theme',
                'ul' => 'Ul',
                'fightform' => 'Fightform',
                'gstate' => 'Gstate',
                'estimate'=>'estimate',
                'logo'=>'logo',
                //'chargingMode' => 'Charging Mode',
//                'address' => 'Address',
                'img' => 'Img',
//                 'examine'=>'审核状态',               
            );
        }
        public function attributeSearchLabels() {
            return array(
                'name' => 'Name',
                
                'gstate' => '测试状态',
//                'typeo' => 'Typeo',
                'created'=>'date',
            );
        }
        public function attributeAdminLabels() {
            return array(
                'checkbox'=>'选择',
                'name' => '游戏名称',
                'typeo'=>'游戏类型',
                'theme' => '主题',
                'theme' => '游戏题材',
                'gstate' => '游戏状态',
                'created'=>'入库时间',
              // 'chargingMode' => '充值模式',
//               'examine'=>'审核状态',
            );
        }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('typeo',$this->typeo,true);
		$criteria->compare('initial',$this->initial,true);
		$criteria->compare('examine',$this->examine);
		$criteria->compare('system',$this->system,true);
		$criteria->compare('relative',$this->relative,true);
		$criteria->compare('cCompany',$this->cCompany,true);
		$criteria->compare('rCompany',$this->rCompany,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('downaddress',$this->downaddress,true);
		$criteria->compare('platform',$this->platform,true);
		$criteria->compare('typet',$this->typet,true);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('ul',$this->ul,true);
		$criteria->compare('fightform',$this->fightform,true);
		$criteria->compare('gstate',$this->gstate,true);
		$criteria->compare('chargingMode',$this->chargingMode,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}