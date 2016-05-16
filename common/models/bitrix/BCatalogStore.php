<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_store".
 *
 * @property integer $ID
 * @property string $TITLE
 * @property string $ACTIVE
 * @property string $ADDRESS
 * @property string $DESCRIPTION
 * @property string $GPS_N
 * @property string $GPS_S
 * @property string $IMAGE_ID
 * @property integer $LOCATION_ID
 * @property string $DATE_MODIFY
 * @property string $DATE_CREATE
 * @property integer $USER_ID
 * @property integer $MODIFIED_BY
 * @property string $PHONE
 * @property string $SCHEDULE
 * @property string $XML_ID
 * @property integer $SORT
 * @property string $EMAIL
 * @property string $ISSUING_CENTER
 * @property string $SHIPPING_CENTER
 * @property string $SITE_ID
 */
class BCatalogStore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADDRESS'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['LOCATION_ID', 'USER_ID', 'MODIFIED_BY', 'SORT'], 'integer'],
            [['DATE_MODIFY', 'DATE_CREATE'], 'safe'],
            [['TITLE'], 'string', 'max' => 75],
            [['ACTIVE', 'ISSUING_CENTER', 'SHIPPING_CENTER'], 'string', 'max' => 1],
            [['ADDRESS'], 'string', 'max' => 245],
            [['GPS_N', 'GPS_S'], 'string', 'max' => 15],
            [['IMAGE_ID', 'PHONE'], 'string', 'max' => 45],
            [['SCHEDULE', 'XML_ID', 'EMAIL'], 'string', 'max' => 255],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TITLE' => Yii::t('app', 'Title'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ADDRESS' => Yii::t('app', 'Address'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'GPS_N' => Yii::t('app', 'Gps  N'),
            'GPS_S' => Yii::t('app', 'Gps  S'),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'LOCATION_ID' => Yii::t('app', 'Location '),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'USER_ID' => Yii::t('app', 'User '),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'PHONE' => Yii::t('app', 'Phone'),
            'SCHEDULE' => Yii::t('app', 'Schedule'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'SORT' => Yii::t('app', 'Sort'),
            'EMAIL' => Yii::t('app', 'Email'),
            'ISSUING_CENTER' => Yii::t('app', 'Issuing  Center'),
            'SHIPPING_CENTER' => Yii::t('app', 'Shipping  Center'),
            'SITE_ID' => Yii::t('app', 'Site '),
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
