<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_company".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $LOCATION_ID
 * @property string $CODE
 * @property string $XML_ID
 * @property string $ACTIVE
 * @property string $DATE_CREATE
 * @property string $DATE_MODIFY
 * @property integer $CREATED_BY
 * @property integer $MODIFIED_BY
 * @property string $ADDRESS
 */
class BSaleCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'LOCATION_ID'], 'required'],
            [['DATE_CREATE', 'DATE_MODIFY'], 'safe'],
            [['CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['NAME', 'LOCATION_ID'], 'string', 'max' => 128],
            [['CODE', 'XML_ID'], 'string', 'max' => 45],
            [['ACTIVE'], 'string', 'max' => 1],
            [['ADDRESS'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'LOCATION_ID' => Yii::t('app', 'Location '),
            'CODE' => Yii::t('app', 'Code'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'ADDRESS' => Yii::t('app', 'Address'),
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
