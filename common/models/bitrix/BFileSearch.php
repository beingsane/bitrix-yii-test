<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_file_search".
 *
 * @property integer $ID
 * @property string $SESS_ID
 * @property string $TIMESTAMP_X
 * @property string $F_PATH
 * @property integer $B_DIR
 * @property integer $F_SIZE
 * @property integer $F_TIME
 */
class BFileSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_file_search';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SESS_ID', 'TIMESTAMP_X'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['B_DIR', 'F_SIZE', 'F_TIME'], 'integer'],
            [['SESS_ID', 'F_PATH'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SESS_ID' => Yii::t('app', 'Sess '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'F_PATH' => Yii::t('app', 'F  Path'),
            'B_DIR' => Yii::t('app', 'B  Dir'),
            'F_SIZE' => Yii::t('app', 'F  Size'),
            'F_TIME' => Yii::t('app', 'F  Time'),
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
