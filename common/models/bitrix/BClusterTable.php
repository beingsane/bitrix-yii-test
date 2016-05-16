<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_cluster_table".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $MODULE_ID
 * @property string $TABLE_NAME
 * @property string $KEY_COLUMN
 * @property integer $FROM_NODE_ID
 * @property integer $TO_NODE_ID
 * @property integer $REC_COUNT
 * @property string $LAST_ID
 */
class BClusterTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_cluster_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['FROM_NODE_ID', 'TO_NODE_ID', 'REC_COUNT'], 'integer'],
            [['MODULE_ID', 'TABLE_NAME', 'KEY_COLUMN'], 'string', 'max' => 50],
            [['LAST_ID'], 'string', 'max' => 250]
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
            'MODULE_ID' => Yii::t('app', 'Module '),
            'TABLE_NAME' => Yii::t('app', 'Table  Name'),
            'KEY_COLUMN' => Yii::t('app', 'Key  Column'),
            'FROM_NODE_ID' => Yii::t('app', 'From  Node '),
            'TO_NODE_ID' => Yii::t('app', 'To  Node '),
            'REC_COUNT' => Yii::t('app', 'Rec  Count'),
            'LAST_ID' => Yii::t('app', 'Last '),
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
