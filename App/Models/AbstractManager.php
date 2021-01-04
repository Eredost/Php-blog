<?php

namespace Blog\Models;

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
     * @return object[]
     */
    public static function findAll()
    {
        // TODO: Implement findAll method
    }

    /**
     * A method to retrieve a single object from the given identifier
     *
     * @param int $id The identifier of the entity
     */
    public static function find(int $id)
    {
        // TODO: Implement find method
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
