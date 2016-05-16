<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_conv_context".
 *
 * @property string $ID
 * @property string $SNAPSHOT
 */
class BConvContext extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_conv_context';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SNAPSHOT'], 'required'],
            [['SNAPSHOT'], 'string', 'max' => 64],
            [['SNAPSHOT'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SNAPSHOT' => Yii::t('app', 'Snapshot'),
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
