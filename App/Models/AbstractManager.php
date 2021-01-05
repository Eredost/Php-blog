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

        $pdo = DBData::getDBH();
        $sql = "
            SELECT {$tableFields}
                FROM {$tableName};
        ";
        $request = $pdo->query($sql);

        return $request->fetchAll(\PDO::FETCH_CLASS, preg_replace('/Manager$/', '', static::class));
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

        return $request->fetchObject(preg_replace('/Manager$/', '', static::class));
    }

    /**
     * Save an object in the database
     *
     * @return self
     */
    public function insert()
    {
        // TODO: Implement insert method
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
