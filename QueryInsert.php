<?php

namespace app\components;

use yii;

/**
 * Add insert command to default Query
 * @version 1.0.0
 * @author restlinru@yandex.ru
 */
class QueryInsert extends \yii\db\Query
{
    /**
     * Insert resulted data from query into table
     * @param string $table table name
     * @param array $columns array with column names
     * @param \yii\db\Connection $db database connection for this command execution 
     * @return boolean
     */
    public function insert($table,$columns,$db = null)
    {
        if($db === null) {
            $db = Yii::$app->getDb();
        }
        $schema = $db->getSchema();
        $tableQuoted = $schema->quoteTableName($table);
        $columnsQuoted = [];
        foreach($columns as $column) {
            $columnsQuoted[] = $schema->quoteSimpleColumnName($column);
        }
        $sql = "INSERT INTO $tableQuoted(".implode($columnsQuoted,',').")\n".$this->createCommand()->rawSql;
        return $db->createCommand($sql)->execute();
    }
}
