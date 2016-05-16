<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_banner".
 *
 * @property integer $ID
 * @property integer $CONTRACT_ID
 * @property string $TYPE_SID
 * @property string $STATUS_SID
 * @property string $STATUS_COMMENTS
 * @property string $NAME
 * @property string $GROUP_SID
 * @property string $FIRST_SITE_ID
 * @property string $ACTIVE
 * @property integer $WEIGHT
 * @property integer $MAX_SHOW_COUNT
 * @property integer $SHOW_COUNT
 * @property string $FIX_CLICK
 * @property string $FIX_SHOW
 * @property integer $MAX_CLICK_COUNT
 * @property integer $CLICK_COUNT
 * @property integer $MAX_VISITOR_COUNT
 * @property integer $VISITOR_COUNT
 * @property integer $SHOWS_FOR_VISITOR
 * @property string $DATE_LAST_SHOW
 * @property string $DATE_LAST_CLICK
 * @property string $DATE_SHOW_FROM
 * @property string $DATE_SHOW_TO
 * @property integer $IMAGE_ID
 * @property string $IMAGE_ALT
 * @property string $URL
 * @property string $URL_TARGET
 * @property string $CODE
 * @property string $CODE_TYPE
 * @property string $STAT_EVENT_1
 * @property string $STAT_EVENT_2
 * @property string $STAT_EVENT_3
 * @property string $FOR_NEW_GUEST
 * @property string $KEYWORDS
 * @property string $COMMENTS
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property string $DATE_MODIFY
 * @property integer $MODIFIED_BY
 * @property string $SHOW_USER_GROUP
 * @property string $NO_URL_IN_FLASH
 * @property string $FLYUNIFORM
 * @property string $DATE_SHOW_FIRST
 * @property string $AD_TYPE
 * @property string $FLASH_TRANSPARENT
 * @property integer $FLASH_IMAGE
 * @property string $FLASH_JS
 * @property string $FLASH_VER
 * @property string $STAT_TYPE
 * @property integer $STAT_COUNT
 * @property string $TEMPLATE
 * @property string $TEMPLATE_FILES
 */
class BAdvBanner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTRACT_ID', 'WEIGHT', 'MAX_SHOW_COUNT', 'SHOW_COUNT', 'MAX_CLICK_COUNT', 'CLICK_COUNT', 'MAX_VISITOR_COUNT', 'VISITOR_COUNT', 'SHOWS_FOR_VISITOR', 'IMAGE_ID', 'CREATED_BY', 'MODIFIED_BY', 'FLASH_IMAGE', 'STAT_COUNT'], 'integer'],
            [['TYPE_SID'], 'required'],
            [['STATUS_COMMENTS', 'URL', 'CODE', 'KEYWORDS', 'COMMENTS', 'TEMPLATE'], 'string'],
            [['DATE_LAST_SHOW', 'DATE_LAST_CLICK', 'DATE_SHOW_FROM', 'DATE_SHOW_TO', 'DATE_CREATE', 'DATE_MODIFY', 'DATE_SHOW_FIRST'], 'safe'],
            [['TYPE_SID', 'STATUS_SID', 'NAME', 'GROUP_SID', 'IMAGE_ALT', 'URL_TARGET', 'STAT_EVENT_1', 'STAT_EVENT_2', 'STAT_EVENT_3'], 'string', 'max' => 255],
            [['FIRST_SITE_ID'], 'string', 'max' => 2],
            [['ACTIVE', 'FIX_CLICK', 'FIX_SHOW', 'FOR_NEW_GUEST', 'SHOW_USER_GROUP', 'NO_URL_IN_FLASH', 'FLYUNIFORM', 'FLASH_JS'], 'string', 'max' => 1],
            [['CODE_TYPE'], 'string', 'max' => 5],
            [['AD_TYPE', 'FLASH_TRANSPARENT', 'FLASH_VER', 'STAT_TYPE'], 'string', 'max' => 20],
            [['TEMPLATE_FILES'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CONTRACT_ID' => Yii::t('app', 'Contract '),
            'TYPE_SID' => Yii::t('app', 'Type  Sid'),
            'STATUS_SID' => Yii::t('app', 'Status  Sid'),
            'STATUS_COMMENTS' => Yii::t('app', 'Status  Comments'),
            'NAME' => Yii::t('app', 'Name'),
            'GROUP_SID' => Yii::t('app', 'Group  Sid'),
            'FIRST_SITE_ID' => Yii::t('app', 'First  Site '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'WEIGHT' => Yii::t('app', 'Weight'),
            'MAX_SHOW_COUNT' => Yii::t('app', 'Max  Show  Count'),
            'SHOW_COUNT' => Yii::t('app', 'Show  Count'),
            'FIX_CLICK' => Yii::t('app', 'Fix  Click'),
            'FIX_SHOW' => Yii::t('app', 'Fix  Show'),
            'MAX_CLICK_COUNT' => Yii::t('app', 'Max  Click  Count'),
            'CLICK_COUNT' => Yii::t('app', 'Click  Count'),
            'MAX_VISITOR_COUNT' => Yii::t('app', 'Max  Visitor  Count'),
            'VISITOR_COUNT' => Yii::t('app', 'Visitor  Count'),
            'SHOWS_FOR_VISITOR' => Yii::t('app', 'Shows  For  Visitor'),
            'DATE_LAST_SHOW' => Yii::t('app', 'Date  Last  Show'),
            'DATE_LAST_CLICK' => Yii::t('app', 'Date  Last  Click'),
            'DATE_SHOW_FROM' => Yii::t('app', 'Date  Show  From'),
            'DATE_SHOW_TO' => Yii::t('app', 'Date  Show  To'),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'IMAGE_ALT' => Yii::t('app', 'Image  Alt'),
            'URL' => Yii::t('app', 'Url'),
            'URL_TARGET' => Yii::t('app', 'Url  Target'),
            'CODE' => Yii::t('app', 'Code'),
            'CODE_TYPE' => Yii::t('app', 'Code  Type'),
            'STAT_EVENT_1' => Yii::t('app', 'Stat  Event 1'),
            'STAT_EVENT_2' => Yii::t('app', 'Stat  Event 2'),
            'STAT_EVENT_3' => Yii::t('app', 'Stat  Event 3'),
            'FOR_NEW_GUEST' => Yii::t('app', 'For  New  Guest'),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'SHOW_USER_GROUP' => Yii::t('app', 'Show  User  Group'),
            'NO_URL_IN_FLASH' => Yii::t('app', 'No  Url  In  Flash'),
            'FLYUNIFORM' => Yii::t('app', 'Flyuniform'),
            'DATE_SHOW_FIRST' => Yii::t('app', 'Date  Show  First'),
            'AD_TYPE' => Yii::t('app', 'Ad  Type'),
            'FLASH_TRANSPARENT' => Yii::t('app', 'Flash  Transparent'),
            'FLASH_IMAGE' => Yii::t('app', 'Flash  Image'),
            'FLASH_JS' => Yii::t('app', 'Flash  Js'),
            'FLASH_VER' => Yii::t('app', 'Flash  Ver'),
            'STAT_TYPE' => Yii::t('app', 'Stat  Type'),
            'STAT_COUNT' => Yii::t('app', 'Stat  Count'),
            'TEMPLATE' => Yii::t('app', 'Template'),
            'TEMPLATE_FILES' => Yii::t('app', 'Template  Files'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
