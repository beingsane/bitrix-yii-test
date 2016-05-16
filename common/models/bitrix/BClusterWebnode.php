<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_cluster_webnode".
 *
 * @property integer $ID
 * @property integer $GROUP_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $HOST
 * @property integer $PORT
 * @property string $STATUS_URL
 */
class BClusterWebnode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_cluster_webnode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUP_ID', 'PORT'], 'integer'],
            [['NAME'], 'string', 'max' => 50],
            [['DESCRIPTION', 'HOST', 'STATUS_URL'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'HOST' => Yii::t('app', 'Host'),
            'PORT' => Yii::t('app', 'Port'),
            'STATUS_URL' => Yii::t('app', 'Status  Url'),
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
