<?php

namespace Blog\Models;

use Blog\Utils\DBData;

abstract class UserManager extends AbstractManager
{
    /**
     * {@inheritdoc}
     */
    protected const TABLE_NAME = 'user';

    /**
     * {@inheritdoc}
     */
    protected const TABLE_FIELDS = [
        'id',
        'username',
        'email',
        'role',
        'password',
        'createdAt',
        'updatedAt',
    ];

    /**
     * Returns a user according to the given email if this one exists
     *
     * @param string $email
     *
     * @return mixed
     */
    public static function findUserByEmail(string $email)
    {
        $sql = "
            SELECT id, username, email, role, password
                FROM user
                WHERE email = :email;
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->prepare($sql);
        $request->execute([
            'email' => $email,
        ]);

        return $request->fetchObject(User::class);
    }

    /**
     * Finds a user by column name and value
     *
     * @param string $column The name of the table column
     * @param string $needle Value to look for
     *
     * @return mixed
     */
    public static function findUserBy(string $column, string $needle)
    {
        $sql = "
            SELECT {$column}
                FROM user 
                WHERE {$column} = ?;
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->prepare($sql);
        $request->execute([$needle]);

        return $request->fetchObject(User::class);
    }
}
