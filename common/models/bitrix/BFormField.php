<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_field".
 *
 * @property integer $ID
 * @property integer $FORM_ID
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property string $TITLE
 * @property string $TITLE_TYPE
 * @property string $SID
 * @property integer $C_SORT
 * @property string $ADDITIONAL
 * @property string $REQUIRED
 * @property string $IN_FILTER
 * @property string $IN_RESULTS_TABLE
 * @property string $IN_EXCEL_TABLE
 * @property string $FIELD_TYPE
 * @property integer $IMAGE_ID
 * @property string $COMMENTS
 * @property string $FILTER_TITLE
 * @property string $RESULTS_TABLE_TITLE
 */
class BFormField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORM_ID', 'C_SORT', 'IMAGE_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['TITLE', 'COMMENTS', 'FILTER_TITLE', 'RESULTS_TABLE_TITLE'], 'string'],
            [['ACTIVE', 'ADDITIONAL', 'REQUIRED', 'IN_FILTER', 'IN_RESULTS_TABLE', 'IN_EXCEL_TABLE'], 'string', 'max' => 1],
            [['TITLE_TYPE'], 'string', 'max' => 4],
            [['SID', 'FIELD_TYPE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FORM_ID' => Yii::t('app', 'Form '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'TITLE' => Yii::t('app', 'Title'),
            'TITLE_TYPE' => Yii::t('app', 'Title  Type'),
            'SID' => Yii::t('app', 'Sid'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'ADDITIONAL' => Yii::t('app', 'Additional'),
            'REQUIRED' => Yii::t('app', 'Required'),
            'IN_FILTER' => Yii::t('app', 'In  Filter'),
            'IN_RESULTS_TABLE' => Yii::t('app', 'In  Results  Table'),
            'IN_EXCEL_TABLE' => Yii::t('app', 'In  Excel  Table'),
            'FIELD_TYPE' => Yii::t('app', 'Field  Type'),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'FILTER_TITLE' => Yii::t('app', 'Filter  Title'),
            'RESULTS_TABLE_TITLE' => Yii::t('app', 'Results  Table  Title'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
