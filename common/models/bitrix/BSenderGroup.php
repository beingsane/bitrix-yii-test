<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_group".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $SORT
 * @property string $ACTIVE
 * @property integer $ADDRESS_COUNT
 */
class BSenderGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DESCRIPTION'], 'string'],
            [['SORT', 'ADDRESS_COUNT'], 'integer'],
            [['NAME'], 'string', 'max' => 100],
            [['ACTIVE'], 'string', 'max' => 1]
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
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ADDRESS_COUNT' => Yii::t('app', 'Address  Count'),
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
