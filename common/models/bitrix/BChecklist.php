<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_checklist".
 *
 * @property integer $ID
 * @property string $DATE_CREATE
 * @property string $TESTER
 * @property string $COMPANY_NAME
 * @property integer $PICTURE
 * @property integer $TOTAL
 * @property integer $SUCCESS
 * @property integer $FAILED
 * @property integer $PENDING
 * @property integer $SKIP
 * @property string $STATE
 * @property string $REPORT_COMMENT
 * @property string $REPORT
 * @property string $EMAIL
 * @property string $PHONE
 * @property string $SENDED_TO_BITRIX
 * @property string $HIDDEN
 */
class BChecklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_checklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PICTURE', 'TOTAL', 'SUCCESS', 'FAILED', 'PENDING', 'SKIP'], 'integer'],
            [['STATE', 'REPORT_COMMENT'], 'string'],
            [['DATE_CREATE', 'COMPANY_NAME'], 'string', 'max' => 255],
            [['TESTER', 'EMAIL', 'PHONE'], 'string', 'max' => 50],
            [['REPORT', 'SENDED_TO_BITRIX', 'HIDDEN'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'TESTER' => Yii::t('app', 'Tester'),
            'COMPANY_NAME' => Yii::t('app', 'Company  Name'),
            'PICTURE' => Yii::t('app', 'Picture'),
            'TOTAL' => Yii::t('app', 'Total'),
            'SUCCESS' => Yii::t('app', 'Success'),
            'FAILED' => Yii::t('app', 'Failed'),
            'PENDING' => Yii::t('app', 'Pending'),
            'SKIP' => Yii::t('app', 'Skip'),
            'STATE' => Yii::t('app', 'State'),
            'REPORT_COMMENT' => Yii::t('app', 'Report  Comment'),
            'REPORT' => Yii::t('app', 'Report'),
            'EMAIL' => Yii::t('app', 'Email'),
            'PHONE' => Yii::t('app', 'Phone'),
            'SENDED_TO_BITRIX' => Yii::t('app', 'Sended  To  Bitrix'),
            'HIDDEN' => Yii::t('app', 'Hidden'),
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
