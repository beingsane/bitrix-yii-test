<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_path".
 *
 * @property integer $ID
 * @property integer $PATH_ID
 * @property integer $PARENT_PATH_ID
 * @property string $DATE_STAT
 * @property integer $COUNTER
 * @property integer $COUNTER_ABNORMAL
 * @property integer $COUNTER_FULL_PATH
 * @property string $PAGES
 * @property string $FIRST_PAGE
 * @property string $FIRST_PAGE_404
 * @property string $FIRST_PAGE_SITE_ID
 * @property string $PREV_PAGE
 * @property integer $PREV_PAGE_HASH
 * @property string $LAST_PAGE
 * @property string $LAST_PAGE_404
 * @property string $LAST_PAGE_SITE_ID
 * @property integer $LAST_PAGE_HASH
 * @property integer $STEPS
 */
class BStatPath extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_path';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PATH_ID', 'PARENT_PATH_ID', 'COUNTER', 'COUNTER_ABNORMAL', 'COUNTER_FULL_PATH', 'PREV_PAGE_HASH', 'LAST_PAGE_HASH', 'STEPS'], 'integer'],
            [['DATE_STAT'], 'safe'],
            [['PAGES'], 'string'],
            [['FIRST_PAGE', 'PREV_PAGE', 'LAST_PAGE'], 'string', 'max' => 255],
            [['FIRST_PAGE_404', 'LAST_PAGE_404'], 'string', 'max' => 1],
            [['FIRST_PAGE_SITE_ID', 'LAST_PAGE_SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PATH_ID' => Yii::t('app', 'Path '),
            'PARENT_PATH_ID' => Yii::t('app', 'Parent  Path '),
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'COUNTER' => Yii::t('app', 'Counter'),
            'COUNTER_ABNORMAL' => Yii::t('app', 'Counter  Abnormal'),
            'COUNTER_FULL_PATH' => Yii::t('app', 'Counter  Full  Path'),
            'PAGES' => Yii::t('app', 'Pages'),
            'FIRST_PAGE' => Yii::t('app', 'First  Page'),
            'FIRST_PAGE_404' => Yii::t('app', 'First  Page 404'),
            'FIRST_PAGE_SITE_ID' => Yii::t('app', 'First  Page  Site '),
            'PREV_PAGE' => Yii::t('app', 'Prev  Page'),
            'PREV_PAGE_HASH' => Yii::t('app', 'Prev  Page  Hash'),
            'LAST_PAGE' => Yii::t('app', 'Last  Page'),
            'LAST_PAGE_404' => Yii::t('app', 'Last  Page 404'),
            'LAST_PAGE_SITE_ID' => Yii::t('app', 'Last  Page  Site '),
            'LAST_PAGE_HASH' => Yii::t('app', 'Last  Page  Hash'),
            'STEPS' => Yii::t('app', 'Steps'),
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
