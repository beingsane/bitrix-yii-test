<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_list".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $CODE
 * @property integer $SORT
 */
class BSenderList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT'], 'integer'],
            [['NAME'], 'string', 'max' => 100],
            [['CODE'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'CODE' => Yii::t('app', 'Code'),
            'SORT' => Yii::t('app', 'Sort'),
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
