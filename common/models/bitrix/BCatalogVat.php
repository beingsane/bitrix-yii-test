<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_vat".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property integer $C_SORT
 * @property string $NAME
 * @property string $RATE
 */
class BCatalogVat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_vat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['C_SORT'], 'integer'],
            [['RATE'], 'number'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'RATE' => Yii::t('app', 'Rate'),
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
