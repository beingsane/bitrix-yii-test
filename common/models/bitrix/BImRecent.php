<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_recent".
 *
 * @property integer $USER_ID
 * @property string $ITEM_TYPE
 * @property integer $ITEM_ID
 * @property integer $ITEM_MID
 */
class BImRecent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_recent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ITEM_TYPE', 'ITEM_ID', 'ITEM_MID'], 'required'],
            [['USER_ID', 'ITEM_ID', 'ITEM_MID'], 'integer'],
            [['ITEM_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'ITEM_TYPE' => Yii::t('app', 'Item  Type'),
            'ITEM_ID' => Yii::t('app', 'Item '),
            'ITEM_MID' => Yii::t('app', 'Item  Mid'),
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
