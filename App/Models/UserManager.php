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
}
