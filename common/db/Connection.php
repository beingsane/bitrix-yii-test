<?php

namespace common\db;

use Yii;
use yii\db\Connection as BaseConnection;

/**
 * Overrides table prefix definition
 * Allows to add different prefixes for different tables
 * Does not allow to use same table names with different prefixes,
 * because definition is based on base table name (without prefix)
 */
class Connection extends BaseConnection
{
    /**
     * Array of table prefixes
     * ['table_name' => 'table_prefix', ...]
     */
    public $tablePrefixes = [];


    /**
     * @inheritdoc
     */
    public function quoteSql($sql)
    {
        return preg_replace_callback(
            '/(\\{\\{(%?[\w\-\. ]+%?)\\}\\}|\\[\\[([\w\-\. ]+)\\]\\])/',
            function ($matches) {
                if (isset($matches[3])) {
                    return $this->quoteColumnName($matches[3]);
                } else {
                    return str_replace('%', $this->getTablePrefix($matches[2]), $this->quoteTableName($matches[2]));
                }
            },
            $sql
        );
    }

    /**
     * Returns table prefix used for $table
     * @param string $table
     */
    public function getTablePrefix($table)
    {
        return isset($this->tablePrefixes[$table]) ? $this->tablePrefixes[$table] : $this->tablePrefix;
    }
}
