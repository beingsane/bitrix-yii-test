<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_contract".
 *
 * @property integer $ID
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $KEYWORDS
 * @property string $ADMIN_COMMENTS
 * @property integer $WEIGHT
 * @property integer $SORT
 * @property integer $MAX_SHOW_COUNT
 * @property integer $SHOW_COUNT
 * @property integer $MAX_CLICK_COUNT
 * @property integer $CLICK_COUNT
 * @property integer $MAX_VISITOR_COUNT
 * @property integer $VISITOR_COUNT
 * @property string $DATE_SHOW_FROM
 * @property string $DATE_SHOW_TO
 * @property string $DEFAULT_STATUS_SID
 * @property integer $EMAIL_COUNT
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property string $DATE_MODIFY
 * @property integer $MODIFIED_BY
 */
class BAdvContract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DESCRIPTION', 'KEYWORDS', 'ADMIN_COMMENTS'], 'string'],
            [['WEIGHT', 'SORT', 'MAX_SHOW_COUNT', 'SHOW_COUNT', 'MAX_CLICK_COUNT', 'CLICK_COUNT', 'MAX_VISITOR_COUNT', 'VISITOR_COUNT', 'EMAIL_COUNT', 'CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['DATE_SHOW_FROM', 'DATE_SHOW_TO', 'DATE_CREATE', 'DATE_MODIFY'], 'safe'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['NAME', 'DEFAULT_STATUS_SID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
            'ADMIN_COMMENTS' => Yii::t('app', 'Admin  Comments'),
            'WEIGHT' => Yii::t('app', 'Weight'),
            'SORT' => Yii::t('app', 'Sort'),
            'MAX_SHOW_COUNT' => Yii::t('app', 'Max  Show  Count'),
            'SHOW_COUNT' => Yii::t('app', 'Show  Count'),
            'MAX_CLICK_COUNT' => Yii::t('app', 'Max  Click  Count'),
            'CLICK_COUNT' => Yii::t('app', 'Click  Count'),
            'MAX_VISITOR_COUNT' => Yii::t('app', 'Max  Visitor  Count'),
            'VISITOR_COUNT' => Yii::t('app', 'Visitor  Count'),
            'DATE_SHOW_FROM' => Yii::t('app', 'Date  Show  From'),
            'DATE_SHOW_TO' => Yii::t('app', 'Date  Show  To'),
            'DEFAULT_STATUS_SID' => Yii::t('app', 'Default  Status  Sid'),
            'EMAIL_COUNT' => Yii::t('app', 'Email  Count'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
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
