<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_path_cache".
 *
 * @property integer $ID
 * @property integer $SESSION_ID
 * @property string $DATE_HIT
 * @property integer $PATH_ID
 * @property string $PATH_PAGES
 * @property string $PATH_FIRST_PAGE
 * @property string $PATH_FIRST_PAGE_404
 * @property string $PATH_FIRST_PAGE_SITE_ID
 * @property string $PATH_LAST_PAGE
 * @property string $PATH_LAST_PAGE_404
 * @property string $PATH_LAST_PAGE_SITE_ID
 * @property integer $PATH_STEPS
 * @property string $IS_LAST_PAGE
 */
class BStatPathCache extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_path_cache';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SESSION_ID', 'PATH_ID', 'PATH_STEPS'], 'integer'],
            [['DATE_HIT'], 'safe'],
            [['PATH_PAGES'], 'string'],
            [['PATH_FIRST_PAGE', 'PATH_LAST_PAGE'], 'string', 'max' => 255],
            [['PATH_FIRST_PAGE_404', 'PATH_LAST_PAGE_404', 'IS_LAST_PAGE'], 'string', 'max' => 1],
            [['PATH_FIRST_PAGE_SITE_ID', 'PATH_LAST_PAGE_SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'DATE_HIT' => Yii::t('app', 'Date  Hit'),
            'PATH_ID' => Yii::t('app', 'Path '),
            'PATH_PAGES' => Yii::t('app', 'Path  Pages'),
            'PATH_FIRST_PAGE' => Yii::t('app', 'Path  First  Page'),
            'PATH_FIRST_PAGE_404' => Yii::t('app', 'Path  First  Page 404'),
            'PATH_FIRST_PAGE_SITE_ID' => Yii::t('app', 'Path  First  Page  Site '),
            'PATH_LAST_PAGE' => Yii::t('app', 'Path  Last  Page'),
            'PATH_LAST_PAGE_404' => Yii::t('app', 'Path  Last  Page 404'),
            'PATH_LAST_PAGE_SITE_ID' => Yii::t('app', 'Path  Last  Page  Site '),
            'PATH_STEPS' => Yii::t('app', 'Path  Steps'),
            'IS_LAST_PAGE' => Yii::t('app', 'Is  Last  Page'),
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
