<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_searcher".
 *
 * @property integer $ID
 * @property string $DATE_CLEANUP
 * @property integer $TOTAL_HITS
 * @property string $SAVE_STATISTIC
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $USER_AGENT
 * @property string $DIAGRAM_DEFAULT
 * @property integer $HIT_KEEP_DAYS
 * @property integer $DYNAMIC_KEEP_DAYS
 * @property integer $PHRASES
 * @property integer $PHRASES_HITS
 * @property string $CHECK_ACTIVITY
 */
class BStatSearcher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_searcher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_CLEANUP'], 'safe'],
            [['TOTAL_HITS', 'HIT_KEEP_DAYS', 'DYNAMIC_KEEP_DAYS', 'PHRASES', 'PHRASES_HITS'], 'integer'],
            [['NAME'], 'required'],
            [['USER_AGENT'], 'string'],
            [['SAVE_STATISTIC', 'ACTIVE', 'DIAGRAM_DEFAULT', 'CHECK_ACTIVITY'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_CLEANUP' => Yii::t('app', 'Date  Cleanup'),
            'TOTAL_HITS' => Yii::t('app', 'Total  Hits'),
            'SAVE_STATISTIC' => Yii::t('app', 'Save  Statistic'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'USER_AGENT' => Yii::t('app', 'User  Agent'),
            'DIAGRAM_DEFAULT' => Yii::t('app', 'Diagram  Default'),
            'HIT_KEEP_DAYS' => Yii::t('app', 'Hit  Keep  Days'),
            'DYNAMIC_KEEP_DAYS' => Yii::t('app', 'Dynamic  Keep  Days'),
            'PHRASES' => Yii::t('app', 'Phrases'),
            'PHRASES_HITS' => Yii::t('app', 'Phrases  Hits'),
            'CHECK_ACTIVITY' => Yii::t('app', 'Check  Activity'),
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
