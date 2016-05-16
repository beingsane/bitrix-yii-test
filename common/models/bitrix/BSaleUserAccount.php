<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_user_account".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $TIMESTAMP_X
 * @property string $CURRENT_BUDGET
 * @property string $CURRENCY
 * @property string $LOCKED
 * @property string $DATE_LOCKED
 * @property string $NOTES
 */
class BSaleUserAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_user_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'TIMESTAMP_X', 'CURRENCY'], 'required'],
            [['USER_ID'], 'integer'],
            [['TIMESTAMP_X', 'DATE_LOCKED'], 'safe'],
            [['CURRENT_BUDGET'], 'number'],
            [['NOTES'], 'string'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['LOCKED'], 'string', 'max' => 1],
            [['USER_ID', 'CURRENCY'], 'unique', 'targetAttribute' => ['USER_ID', 'CURRENCY'], 'message' => 'The combination of User  and Currency has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'CURRENT_BUDGET' => Yii::t('app', 'Current  Budget'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'LOCKED' => Yii::t('app', 'Locked'),
            'DATE_LOCKED' => Yii::t('app', 'Date  Locked'),
            'NOTES' => Yii::t('app', 'Notes'),
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
