<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_fuser".
 *
 * @property integer $ID
 * @property string $DATE_INSERT
 * @property string $DATE_UPDATE
 * @property integer $USER_ID
 * @property string $CODE
 */
class BSaleFuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_fuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_INSERT', 'DATE_UPDATE'], 'required'],
            [['DATE_INSERT', 'DATE_UPDATE'], 'safe'],
            [['USER_ID'], 'integer'],
            [['CODE'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
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
