<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_subscription".
 *
 * @property integer $ID
 * @property string $DATE_INSERT
 * @property string $DATE_UPDATE
 * @property integer $USER_ID
 * @property string $ACTIVE
 * @property string $EMAIL
 * @property string $FORMAT
 * @property string $CONFIRM_CODE
 * @property string $CONFIRMED
 * @property string $DATE_CONFIRM
 */
class BSubscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_INSERT', 'EMAIL', 'DATE_CONFIRM'], 'required'],
            [['DATE_INSERT', 'DATE_UPDATE', 'DATE_CONFIRM'], 'safe'],
            [['USER_ID'], 'integer'],
            [['ACTIVE', 'CONFIRMED'], 'string', 'max' => 1],
            [['EMAIL'], 'string', 'max' => 255],
            [['FORMAT'], 'string', 'max' => 4],
            [['CONFIRM_CODE'], 'string', 'max' => 8],
            [['EMAIL', 'USER_ID'], 'unique', 'targetAttribute' => ['EMAIL', 'USER_ID'], 'message' => 'The combination of User  and Email has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'USER_ID' => Yii::t('app', 'User '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'EMAIL' => Yii::t('app', 'Email'),
            'FORMAT' => Yii::t('app', 'Format'),
            'CONFIRM_CODE' => Yii::t('app', 'Confirm  Code'),
            'CONFIRMED' => Yii::t('app', 'Confirmed'),
            'DATE_CONFIRM' => Yii::t('app', 'Date  Confirm'),
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
