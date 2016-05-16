<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_iprule".
 *
 * @property integer $ID
 * @property string $RULE_TYPE
 * @property string $ACTIVE
 * @property string $ADMIN_SECTION
 * @property string $SITE_ID
 * @property integer $SORT
 * @property string $ACTIVE_FROM
 * @property integer $ACTIVE_FROM_TIMESTAMP
 * @property string $ACTIVE_TO
 * @property integer $ACTIVE_TO_TIMESTAMP
 * @property string $NAME
 */
class BSecIprule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_iprule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT', 'ACTIVE_FROM_TIMESTAMP', 'ACTIVE_TO_TIMESTAMP'], 'integer'],
            [['ACTIVE_FROM', 'ACTIVE_TO'], 'safe'],
            [['RULE_TYPE', 'ACTIVE', 'ADMIN_SECTION'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RULE_TYPE' => Yii::t('app', 'Rule  Type'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ADMIN_SECTION' => Yii::t('app', 'Admin  Section'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_FROM_TIMESTAMP' => Yii::t('app', 'Active  From  Timestamp'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'ACTIVE_TO_TIMESTAMP' => Yii::t('app', 'Active  To  Timestamp'),
            'NAME' => Yii::t('app', 'Name'),
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
