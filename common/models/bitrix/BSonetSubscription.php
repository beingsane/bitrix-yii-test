<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_subscription".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $CODE
 */
class BSonetSubscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'CODE'], 'required'],
            [['USER_ID'], 'integer'],
            [['CODE'], 'string', 'max' => 50],
            [['USER_ID', 'CODE'], 'unique', 'targetAttribute' => ['USER_ID', 'CODE'], 'message' => 'The combination of User  and Code has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'CODE' => Yii::t('app', 'Code'),
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
