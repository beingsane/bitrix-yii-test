<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_cluster_queue".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $GROUP_ID
 * @property string $COMMAND
 * @property string $PARAM1
 * @property string $PARAM2
 * @property string $PARAM3
 */
class BClusterQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_cluster_queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['GROUP_ID'], 'required'],
            [['GROUP_ID'], 'integer'],
            [['COMMAND'], 'string', 'max' => 50],
            [['PARAM1', 'PARAM2', 'PARAM3'], 'string', 'max' => 255]
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
            'GROUP_ID' => Yii::t('app', 'Group '),
            'COMMAND' => Yii::t('app', 'Command'),
            'PARAM1' => Yii::t('app', 'Param1'),
            'PARAM2' => Yii::t('app', 'Param2'),
            'PARAM3' => Yii::t('app', 'Param3'),
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
