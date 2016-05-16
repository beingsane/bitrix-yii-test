<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating".
 *
 * @property integer $ID
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $ENTITY_ID
 * @property string $CALCULATION_METHOD
 * @property string $CREATED
 * @property string $LAST_MODIFIED
 * @property string $LAST_CALCULATED
 * @property string $POSITION
 * @property string $AUTHORITY
 * @property string $CALCULATED
 * @property string $CONFIGS
 */
class BRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACTIVE', 'NAME', 'ENTITY_ID'], 'required'],
            [['CREATED', 'LAST_MODIFIED', 'LAST_CALCULATED'], 'safe'],
            [['CONFIGS'], 'string'],
            [['ACTIVE', 'POSITION', 'AUTHORITY', 'CALCULATED'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 512],
            [['ENTITY_ID'], 'string', 'max' => 50],
            [['CALCULATION_METHOD'], 'string', 'max' => 3]
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
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'CALCULATION_METHOD' => Yii::t('app', 'Calculation  Method'),
            'CREATED' => Yii::t('app', 'Created'),
            'LAST_MODIFIED' => Yii::t('app', 'Last  Modified'),
            'LAST_CALCULATED' => Yii::t('app', 'Last  Calculated'),
            'POSITION' => Yii::t('app', 'Position'),
            'AUTHORITY' => Yii::t('app', 'Authority'),
            'CALCULATED' => Yii::t('app', 'Calculated'),
            'CONFIGS' => Yii::t('app', 'Configs'),
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
