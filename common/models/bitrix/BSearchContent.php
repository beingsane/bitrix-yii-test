<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content".
 *
 * @property integer $ID
 * @property string $DATE_CHANGE
 * @property string $MODULE_ID
 * @property string $ITEM_ID
 * @property integer $CUSTOM_RANK
 * @property integer $USER_ID
 * @property string $ENTITY_TYPE_ID
 * @property string $ENTITY_ID
 * @property string $URL
 * @property string $TITLE
 * @property string $BODY
 * @property string $TAGS
 * @property string $PARAM1
 * @property string $PARAM2
 * @property string $UPD
 * @property string $DATE_FROM
 * @property string $DATE_TO
 */
class BSearchContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_CHANGE', 'MODULE_ID', 'ITEM_ID'], 'required'],
            [['DATE_CHANGE', 'DATE_FROM', 'DATE_TO'], 'safe'],
            [['CUSTOM_RANK', 'USER_ID'], 'integer'],
            [['URL', 'TITLE', 'BODY', 'TAGS', 'PARAM1', 'PARAM2'], 'string'],
            [['MODULE_ID', 'ENTITY_TYPE_ID'], 'string', 'max' => 50],
            [['ITEM_ID', 'ENTITY_ID'], 'string', 'max' => 255],
            [['UPD'], 'string', 'max' => 32],
            [['MODULE_ID', 'ITEM_ID'], 'unique', 'targetAttribute' => ['MODULE_ID', 'ITEM_ID'], 'message' => 'The combination of Module  and Item  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_CHANGE' => Yii::t('app', 'Date  Change'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'ITEM_ID' => Yii::t('app', 'Item '),
            'CUSTOM_RANK' => Yii::t('app', 'Custom  Rank'),
            'USER_ID' => Yii::t('app', 'User '),
            'ENTITY_TYPE_ID' => Yii::t('app', 'Entity  Type '),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'URL' => Yii::t('app', 'Url'),
            'TITLE' => Yii::t('app', 'Title'),
            'BODY' => Yii::t('app', 'Body'),
            'TAGS' => Yii::t('app', 'Tags'),
            'PARAM1' => Yii::t('app', 'Param1'),
            'PARAM2' => Yii::t('app', 'Param2'),
            'UPD' => Yii::t('app', 'Upd'),
            'DATE_FROM' => Yii::t('app', 'Date  From'),
            'DATE_TO' => Yii::t('app', 'Date  To'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
