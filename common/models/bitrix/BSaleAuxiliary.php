<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_auxiliary".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $ITEM
 * @property string $ITEM_MD5
 * @property integer $USER_ID
 * @property string $DATE_INSERT
 */
class BSaleAuxiliary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_auxiliary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'ITEM', 'ITEM_MD5', 'USER_ID', 'DATE_INSERT'], 'required'],
            [['TIMESTAMP_X', 'DATE_INSERT'], 'safe'],
            [['USER_ID'], 'integer'],
            [['ITEM'], 'string', 'max' => 255],
            [['ITEM_MD5'], 'string', 'max' => 32],
            [['USER_ID', 'ITEM_MD5'], 'unique', 'targetAttribute' => ['USER_ID', 'ITEM_MD5'], 'message' => 'The combination of Item  Md5 and User  has already been taken.']
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
            'ITEM' => Yii::t('app', 'Item'),
            'ITEM_MD5' => Yii::t('app', 'Item  Md5'),
            'USER_ID' => Yii::t('app', 'User '),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
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
