<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_message_param".
 *
 * @property integer $ID
 * @property integer $MESSAGE_ID
 * @property string $PARAM_NAME
 * @property string $PARAM_VALUE
 * @property string $PARAM_JSON
 */
class BImMessageParam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_message_param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MESSAGE_ID', 'PARAM_NAME'], 'required'],
            [['MESSAGE_ID'], 'integer'],
            [['PARAM_JSON'], 'string'],
            [['PARAM_NAME', 'PARAM_VALUE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'PARAM_NAME' => Yii::t('app', 'Param  Name'),
            'PARAM_VALUE' => Yii::t('app', 'Param  Value'),
            'PARAM_JSON' => Yii::t('app', 'Param  Json'),
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
