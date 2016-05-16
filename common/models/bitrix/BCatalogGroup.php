<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_group".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $BASE
 * @property integer $SORT
 * @property string $XML_ID
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 */
class BCatalogGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['SORT', 'MODIFIED_BY', 'CREATED_BY'], 'integer'],
            [['TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['NAME'], 'string', 'max' => 100],
            [['BASE'], 'string', 'max' => 1],
            [['XML_ID'], 'string', 'max' => 255]
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
            'BASE' => Yii::t('app', 'Base'),
            'SORT' => Yii::t('app', 'Sort'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
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
