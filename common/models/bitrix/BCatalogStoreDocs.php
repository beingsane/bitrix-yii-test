<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_store_docs".
 *
 * @property integer $ID
 * @property string $DOC_TYPE
 * @property string $SITE_ID
 * @property integer $CONTRACTOR_ID
 * @property string $DATE_MODIFY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property integer $MODIFIED_BY
 * @property string $CURRENCY
 * @property string $STATUS
 * @property string $DATE_STATUS
 * @property string $DATE_DOCUMENT
 * @property integer $STATUS_BY
 * @property double $TOTAL
 * @property string $COMMENTARY
 */
class BCatalogStoreDocs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_store_docs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DOC_TYPE'], 'required'],
            [['CONTRACTOR_ID', 'CREATED_BY', 'MODIFIED_BY', 'STATUS_BY'], 'integer'],
            [['DATE_MODIFY', 'DATE_CREATE', 'DATE_STATUS', 'DATE_DOCUMENT'], 'safe'],
            [['TOTAL'], 'number'],
            [['DOC_TYPE', 'STATUS'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2],
            [['CURRENCY'], 'string', 'max' => 3],
            [['COMMENTARY'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DOC_TYPE' => Yii::t('app', 'Doc  Type'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'CONTRACTOR_ID' => Yii::t('app', 'Contractor '),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'STATUS' => Yii::t('app', 'Status'),
            'DATE_STATUS' => Yii::t('app', 'Date  Status'),
            'DATE_DOCUMENT' => Yii::t('app', 'Date  Document'),
            'STATUS_BY' => Yii::t('app', 'Status  By'),
            'TOTAL' => Yii::t('app', 'Total'),
            'COMMENTARY' => Yii::t('app', 'Commentary'),
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
