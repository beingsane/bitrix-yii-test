<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tax".
 *
 * @property integer $ID
 * @property string $LID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $TIMESTAMP_X
 * @property string $CODE
 */
class BSaleTax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'NAME', 'TIMESTAMP_X'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 250],
            [['DESCRIPTION'], 'string', 'max' => 255],
            [['CODE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'CODE' => Yii::t('app', 'Code'),
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
