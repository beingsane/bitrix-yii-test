<?php

namespace common\db\mysql;

use yii\db\mysql\Schema as BaseSchema;

/**
 * Overrides table prefix definition
 */
class Schema extends BaseSchema
{
    /**
     * @inheritdoc
     */
    public function getRawTableName($name)
    {
        if (strpos($name, '{{') !== false) {
            $name = preg_replace('/\\{\\{(.*?)\\}\\}/', '\1', $name);

            return str_replace('%', $this->getTablePrefix($name), $name);
        } else {
            return $name;
        }
    }

    /**
     * Returns table prefix used for $table
     * @param string $table
     */
    public function getTablePrefix($table)
    {
        return $this->db->getTablePrefix($table);
    }
}
