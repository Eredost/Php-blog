<?php

namespace Blog\Models;

use Blog\Utils\DBData;

abstract class AbstractManager
{
    /**
     * Contains the name of the table attached to the entity
     *
     * @var string TABLE_NAME
     */
    protected const TABLE_NAME = '';

    /**
     * Contains all the names of the fields of the entity useful for the insertion
     * or the update of this one.
     *
     * @var array TABLE_FIELDS
     */
    protected const TABLE_FIELDS = [];

    /**
     * Method to retrieve all the objects of a given entity
     *
     * @return array containing all of the remaining rows in the result set.
     * The array represents each row as an object with properties corresponding
     * to each column name.
     */
    public static function findAll(): array
    {
        $tableName = static::TABLE_NAME;
        $tableFields = implode(', ', static::TABLE_FIELDS);
        $className = preg_replace('/Manager$/', '', static::class);

        $pdo = DBData::getDBH();
        $sql = "
            SELECT {$tableFields}
                FROM {$tableName};
        ";
        $request = $pdo->query($sql);

        return $request->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    /**
     * A method to retrieve a single object from the given identifier
     *
     * @param int $id The identifier of the entity
     *
     * @return mixed an instance of the required class with property names that
     * correspond to the column names or <b>FALSE</b> on failure.
     */
    public static function find(int $id)
    {
        $tableName = static::TABLE_NAME;
        $tableFields = implode(', ', static::TABLE_FIELDS);
        $className = preg_replace('/Manager$/', '', static::class);

        $pdo = DBData::getDBH();
        $sql = "
            SELECT {$tableFields}
                FROM {$tableName}
                WHERE id = :id;
        ";
        $request = $pdo->prepare($sql);
        $request->execute([
            'id' => $id,
        ]);

        return $request->fetchObject($className);
    }

    /**
     * Save an object in the database
     *
     * @return boolean <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function save(): bool
    {
        $tableName = static::TABLE_NAME;
        $fieldsName = static::TABLE_FIELDS;
        $insertValues = implode(', ', $fieldsName);
        $paramsValues = [];
        $executeValues = [];

        foreach ($fieldsName as $index => $value) {
            $paramsValues[] = ':' . $value;
            $executeValues[':'.$value] = $this->{'get'.ucfirst($value)}();
        }
        $paramsValues = implode(', ', $paramsValues);

        $sql = "
            INSERT INTO {$tableName} ({$insertValues})
                VALUES ({$paramsValues});
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->prepare($sql);

        return $request->execute($executeValues);
    }

    /**
     * Allows the deletion of an object in the database
     *
     * @return boolean <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function delete()
    {
        $tableName = static::TABLE_NAME;

        $pdo = DBData::getDBH();
        $sql = "
            DELETE FROM {$tableName}
                WHERE id = :id;
        ";
        $request = $pdo->prepare($sql);

        return $request->execute([
            'id' => $this->getId(),
        ]);
    }

    /**
     * Allows to update the properties of an object in the database
     *
     * @return boolean <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function update(): bool
    {
        $tableName = static::TABLE_NAME;
        $fieldsName = static::TABLE_FIELDS;
        $updateValues = [];
        $executeValues = [];

        foreach ($fieldsName as $index => $value) {
            $updateValues[] = "$value = :$value";
            $executeValues[':'.$value] = $this->{'get'.ucfirst($value)}();
        }
        $updateValues = implode(', ', $updateValues);

        $sql = "
            UPDATE {$tableName}
                SET {$updateValues}
                WHERE id = :id;
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->prepare($sql);

        return $request->execute($executeValues);
    }
}
