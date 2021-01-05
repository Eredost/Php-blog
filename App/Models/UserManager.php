<?php

namespace Blog\Models;

class UserManager extends AbstractManager
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
}
