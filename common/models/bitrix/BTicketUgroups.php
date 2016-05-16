<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_ugroups".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $XML_ID
 * @property integer $SORT
 * @property string $IS_TEAM_GROUP
 */
class BTicketUgroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_ugroups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT'], 'integer'],
            [['NAME', 'XML_ID'], 'string', 'max' => 255],
            [['IS_TEAM_GROUP'], 'string', 'max' => 1]
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
            'XML_ID' => Yii::t('app', 'Xml '),
            'SORT' => Yii::t('app', 'Sort'),
            'IS_TEAM_GROUP' => Yii::t('app', 'Is  Team  Group'),
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
