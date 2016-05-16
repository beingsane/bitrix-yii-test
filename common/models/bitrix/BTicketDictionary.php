<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_dictionary".
 *
 * @property integer $ID
 * @property string $FIRST_SITE_ID
 * @property string $C_TYPE
 * @property string $SID
 * @property string $SET_AS_DEFAULT
 * @property integer $C_SORT
 * @property string $NAME
 * @property string $DESCR
 * @property integer $RESPONSIBLE_USER_ID
 * @property string $EVENT1
 * @property string $EVENT2
 * @property string $EVENT3
 */
class BTicketDictionary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_dictionary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['C_TYPE', 'NAME'], 'required'],
            [['C_SORT', 'RESPONSIBLE_USER_ID'], 'integer'],
            [['DESCR'], 'string'],
            [['FIRST_SITE_ID'], 'string', 'max' => 2],
            [['C_TYPE'], 'string', 'max' => 5],
            [['SID', 'NAME', 'EVENT1', 'EVENT2', 'EVENT3'], 'string', 'max' => 255],
            [['SET_AS_DEFAULT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FIRST_SITE_ID' => Yii::t('app', 'First  Site '),
            'C_TYPE' => Yii::t('app', 'C  Type'),
            'SID' => Yii::t('app', 'Sid'),
            'SET_AS_DEFAULT' => Yii::t('app', 'Set  As  Default'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCR' => Yii::t('app', 'Descr'),
            'RESPONSIBLE_USER_ID' => Yii::t('app', 'Responsible  User '),
            'EVENT1' => Yii::t('app', 'Event1'),
            'EVENT2' => Yii::t('app', 'Event2'),
            'EVENT3' => Yii::t('app', 'Event3'),
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
