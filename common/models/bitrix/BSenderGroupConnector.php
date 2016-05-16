<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_group_connector".
 *
 * @property integer $GROUP_ID
 * @property string $NAME
 * @property string $ENDPOINT
 * @property integer $ADDRESS_COUNT
 */
class BSenderGroupConnector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_group_connector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUP_ID'], 'required'],
            [['GROUP_ID', 'ADDRESS_COUNT'], 'integer'],
            [['NAME'], 'string', 'max' => 100],
            [['ENDPOINT'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GROUP_ID' => Yii::t('app', 'Group '),
            'NAME' => Yii::t('app', 'Name'),
            'ENDPOINT' => Yii::t('app', 'Endpoint'),
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
        $list = ArrayHelper::map($models, 'GROUP_ID', 'NAME');
        return $list;
    }
}
