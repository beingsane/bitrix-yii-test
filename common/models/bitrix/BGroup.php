<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_group".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property integer $C_SORT
 * @property string $ANONYMOUS
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $SECURITY_POLICY
 * @property string $STRING_ID
 */
class BGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['C_SORT'], 'integer'],
            [['NAME'], 'required'],
            [['SECURITY_POLICY'], 'string'],
            [['ACTIVE', 'ANONYMOUS'], 'string', 'max' => 1],
            [['NAME', 'DESCRIPTION', 'STRING_ID'], 'string', 'max' => 255]
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
            'ACTIVE' => Yii::t('app', 'Active'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'ANONYMOUS' => Yii::t('app', 'Anonymous'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SECURITY_POLICY' => Yii::t('app', 'Security  Policy'),
            'STRING_ID' => Yii::t('app', 'String '),
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
