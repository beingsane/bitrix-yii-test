<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_contractor".
 *
 * @property integer $ID
 * @property string $PERSON_TYPE
 * @property string $PERSON_NAME
 * @property string $PERSON_LASTNAME
 * @property string $PERSON_MIDDLENAME
 * @property string $EMAIL
 * @property string $PHONE
 * @property string $POST_INDEX
 * @property string $COUNTRY
 * @property string $CITY
 * @property string $COMPANY
 * @property string $INN
 * @property string $KPP
 * @property string $ADDRESS
 * @property string $DATE_MODIFY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property integer $MODIFIED_BY
 */
class BCatalogContractor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_contractor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERSON_TYPE'], 'required'],
            [['DATE_MODIFY', 'DATE_CREATE'], 'safe'],
            [['CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['PERSON_TYPE'], 'string', 'max' => 1],
            [['PERSON_NAME', 'PERSON_LASTNAME', 'PERSON_MIDDLENAME', 'EMAIL'], 'string', 'max' => 100],
            [['PHONE', 'POST_INDEX', 'COUNTRY', 'CITY'], 'string', 'max' => 45],
            [['COMPANY', 'INN', 'KPP'], 'string', 'max' => 145],
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
            'PERSON_TYPE' => Yii::t('app', 'Person  Type'),
            'PERSON_NAME' => Yii::t('app', 'Person  Name'),
            'PERSON_LASTNAME' => Yii::t('app', 'Person  Lastname'),
            'PERSON_MIDDLENAME' => Yii::t('app', 'Person  Middlename'),
            'EMAIL' => Yii::t('app', 'Email'),
            'PHONE' => Yii::t('app', 'Phone'),
            'POST_INDEX' => Yii::t('app', 'Post  Index'),
            'COUNTRY' => Yii::t('app', 'Country'),
            'CITY' => Yii::t('app', 'City'),
            'COMPANY' => Yii::t('app', 'Company'),
            'INN' => Yii::t('app', 'Inn'),
            'KPP' => Yii::t('app', 'Kpp'),
            'ADDRESS' => Yii::t('app', 'Address'),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
