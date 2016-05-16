<?php

namespace common\modules\gii\generators\model;

use Yii;

class Generator extends \yii\gii\generators\model\Generator
{
    public function getNameAttribute($tableSchema)
    {
        $nameAttribute = '';
        foreach ($tableSchema->columns as $column) {
            if (!strcasecmp($column->name, 'name') || !strcasecmp($column->name, 'title')) {
                $nameAttribute = $column->name;
                break;
            }
        }

        if (!$nameAttribute) {
            $pk = $tableSchema->primaryKey;
            if (isset($pk[0])) {
                $nameAttribute = $pk[0];
            } else {
                $nameAttribute = array_keys($tableSchema->columns)[0];
            }
        }

        return $nameAttribute;
    }

    public function generateLabels($table)
    {
        $labels = parent::generateLabels($table);

        foreach ($labels as $name => $label) {
            // remove ' ID' ending and leave only entity name
            if (substr_compare($label, ' ID', -3, 3, true) === 0) {
                $label = substr($label, 0, -3);
                $labels[$name] = $label;
            }
        }

        return $labels;
    }
}
