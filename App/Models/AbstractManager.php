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
     * @return array
     */
    public static function findAll()
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
     * @return mixed
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
     * @return boolean
     */
    public function save(): bool
    {
        $tableName = static::TABLE_NAME;
        $fieldsName = static::TABLE_FIELDS;

        $pdo = DBData::getDBH();
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
        $request = $pdo->prepare($sql);

        return $request->execute($executeValues);
    }

    /**
     * Allows the deletion of an object in the database
     *
     * @return boolean
     */
    public function delete()
    {
        // TODO: Implement delete method
    }

    /**
     * Allows to update the properties of an object in the database
     */
    public function update()
    {
        // TODO: Implement update method
    }
}
