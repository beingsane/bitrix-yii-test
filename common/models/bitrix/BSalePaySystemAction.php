<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_pay_system_action".
 *
 * @property integer $ID
 * @property integer $PAY_SYSTEM_ID
 * @property integer $PERSON_TYPE_ID
 * @property string $NAME
 * @property string $PSA_NAME
 * @property string $CODE
 * @property integer $SORT
 * @property string $DESCRIPTION
 * @property string $ACTION_FILE
 * @property string $RESULT_FILE
 * @property string $NEW_WINDOW
 * @property string $ACTIVE
 * @property string $PS_MODE
 * @property string $PARAMS
 * @property string $TARIF
 * @property string $HAVE_PAYMENT
 * @property string $HAVE_ACTION
 * @property string $HAVE_RESULT
 * @property string $HAVE_PRICE
 * @property string $HAVE_PREPAY
 * @property string $HAVE_RESULT_RECEIVE
 * @property string $ALLOW_EDIT_PAYMENT
 * @property string $ENCODING
 * @property integer $LOGOTIP
 * @property string $IS_CASH
 */
class BSalePaySystemAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_pay_system_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PAY_SYSTEM_ID', 'PERSON_TYPE_ID', 'SORT', 'LOGOTIP'], 'integer'],
            [['NAME', 'PSA_NAME'], 'required'],
            [['PARAMS', 'TARIF'], 'string'],
            [['NAME', 'PSA_NAME', 'ACTION_FILE', 'RESULT_FILE'], 'string', 'max' => 255],
            [['CODE'], 'string', 'max' => 50],
            [['DESCRIPTION'], 'string', 'max' => 2000],
            [['NEW_WINDOW', 'ACTIVE', 'HAVE_PAYMENT', 'HAVE_ACTION', 'HAVE_RESULT', 'HAVE_PRICE', 'HAVE_PREPAY', 'HAVE_RESULT_RECEIVE', 'ALLOW_EDIT_PAYMENT', 'IS_CASH'], 'string', 'max' => 1],
            [['PS_MODE'], 'string', 'max' => 20],
            [['ENCODING'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PAY_SYSTEM_ID' => Yii::t('app', 'Pay  System '),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'NAME' => Yii::t('app', 'Name'),
            'PSA_NAME' => Yii::t('app', 'Psa  Name'),
            'CODE' => Yii::t('app', 'Code'),
            'SORT' => Yii::t('app', 'Sort'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'ACTION_FILE' => Yii::t('app', 'Action  File'),
            'RESULT_FILE' => Yii::t('app', 'Result  File'),
            'NEW_WINDOW' => Yii::t('app', 'New  Window'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'PS_MODE' => Yii::t('app', 'Ps  Mode'),
            'PARAMS' => Yii::t('app', 'Params'),
            'TARIF' => Yii::t('app', 'Tarif'),
            'HAVE_PAYMENT' => Yii::t('app', 'Have  Payment'),
            'HAVE_ACTION' => Yii::t('app', 'Have  Action'),
            'HAVE_RESULT' => Yii::t('app', 'Have  Result'),
            'HAVE_PRICE' => Yii::t('app', 'Have  Price'),
            'HAVE_PREPAY' => Yii::t('app', 'Have  Prepay'),
            'HAVE_RESULT_RECEIVE' => Yii::t('app', 'Have  Result  Receive'),
            'ALLOW_EDIT_PAYMENT' => Yii::t('app', 'Allow  Edit  Payment'),
            'ENCODING' => Yii::t('app', 'Encoding'),
            'LOGOTIP' => Yii::t('app', 'Logotip'),
            'IS_CASH' => Yii::t('app', 'Is  Cash'),
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
