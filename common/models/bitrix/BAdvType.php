<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_type".
 *
 * @property string $SID
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property string $DATE_MODIFY
 * @property integer $MODIFIED_BY
 */
class BAdvType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SID'], 'required'],
            [['SORT', 'CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['DATE_CREATE', 'DATE_MODIFY'], 'safe'],
            [['SID', 'NAME'], 'string', 'max' => 255],
            [['ACTIVE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SID' => Yii::t('app', 'Sid'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
        $list = ArrayHelper::map($models, 'SID', 'NAME');
        return $list;
    }
}
