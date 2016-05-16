<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_follow".
 *
 * @property integer $USER_ID
 * @property string $CODE
 * @property integer $REF_ID
 * @property string $TYPE
 * @property string $FOLLOW_DATE
 * @property string $BY_WF
 */
class BSonetLogFollow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_follow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'CODE', 'REF_ID'], 'required'],
            [['USER_ID', 'REF_ID'], 'integer'],
            [['FOLLOW_DATE'], 'safe'],
            [['CODE'], 'string', 'max' => 50],
            [['TYPE', 'BY_WF'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'CODE' => Yii::t('app', 'Code'),
            'REF_ID' => Yii::t('app', 'Ref '),
            'TYPE' => Yii::t('app', 'Type'),
            'FOLLOW_DATE' => Yii::t('app', 'Follow  Date'),
            'BY_WF' => Yii::t('app', 'By  Wf'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
