<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_cluster_dbnode".
 *
 * @property integer $ID
 * @property string $ACTIVE
 * @property integer $GROUP_ID
 * @property string $ROLE_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $DB_HOST
 * @property string $DB_NAME
 * @property string $DB_LOGIN
 * @property string $DB_PASSWORD
 * @property integer $MASTER_ID
 * @property string $MASTER_HOST
 * @property integer $MASTER_PORT
 * @property string $SERVER_ID
 * @property string $STATUS
 * @property string $UNIQID
 * @property string $SELECTABLE
 * @property integer $WEIGHT
 */
class BClusterDbnode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_cluster_dbnode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUP_ID', 'MASTER_ID', 'MASTER_PORT', 'WEIGHT'], 'integer'],
            [['ACTIVE', 'SELECTABLE'], 'string', 'max' => 1],
            [['ROLE_ID', 'NAME', 'DB_LOGIN', 'DB_PASSWORD', 'MASTER_HOST', 'SERVER_ID', 'STATUS', 'UNIQID'], 'string', 'max' => 50],
            [['DESCRIPTION', 'DB_HOST', 'DB_NAME'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'ROLE_ID' => Yii::t('app', 'Role '),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DB_HOST' => Yii::t('app', 'Db  Host'),
            'DB_NAME' => Yii::t('app', 'Db  Name'),
            'DB_LOGIN' => Yii::t('app', 'Db  Login'),
            'DB_PASSWORD' => Yii::t('app', 'Db  Password'),
            'MASTER_ID' => Yii::t('app', 'Master '),
            'MASTER_HOST' => Yii::t('app', 'Master  Host'),
            'MASTER_PORT' => Yii::t('app', 'Master  Port'),
            'SERVER_ID' => Yii::t('app', 'Server '),
            'STATUS' => Yii::t('app', 'Status'),
            'UNIQID' => Yii::t('app', 'Uniqid'),
            'SELECTABLE' => Yii::t('app', 'Selectable'),
            'WEIGHT' => Yii::t('app', 'Weight'),
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
