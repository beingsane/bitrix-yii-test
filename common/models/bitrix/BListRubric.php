<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_list_rubric".
 *
 * @property integer $ID
 * @property string $LID
 * @property string $CODE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $SORT
 * @property string $ACTIVE
 * @property string $AUTO
 * @property string $DAYS_OF_MONTH
 * @property string $DAYS_OF_WEEK
 * @property string $TIMES_OF_DAY
 * @property string $TEMPLATE
 * @property string $LAST_EXECUTED
 * @property string $VISIBLE
 * @property string $FROM_FIELD
 */
class BListRubric extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_list_rubric';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['SORT'], 'integer'],
            [['LAST_EXECUTED'], 'safe'],
            [['LID'], 'string', 'max' => 2],
            [['CODE', 'NAME', 'DAYS_OF_MONTH', 'TEMPLATE'], 'string', 'max' => 100],
            [['ACTIVE', 'AUTO', 'VISIBLE'], 'string', 'max' => 1],
            [['DAYS_OF_WEEK'], 'string', 'max' => 15],
            [['TIMES_OF_DAY', 'FROM_FIELD'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LID' => Yii::t('app', 'Lid'),
            'CODE' => Yii::t('app', 'Code'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'AUTO' => Yii::t('app', 'Auto'),
            'DAYS_OF_MONTH' => Yii::t('app', 'Days  Of  Month'),
            'DAYS_OF_WEEK' => Yii::t('app', 'Days  Of  Week'),
            'TIMES_OF_DAY' => Yii::t('app', 'Times  Of  Day'),
            'TEMPLATE' => Yii::t('app', 'Template'),
            'LAST_EXECUTED' => Yii::t('app', 'Last  Executed'),
            'VISIBLE' => Yii::t('app', 'Visible'),
            'FROM_FIELD' => Yii::t('app', 'From  Field'),
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
