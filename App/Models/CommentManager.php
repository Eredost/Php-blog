<?php

namespace Blog\Models;

abstract class CommentManager extends AbstractManager
{
    /**
     * {@inheritdoc}
     */
    protected const TABLE_NAME = 'comment';

    /**
     * {@inheritdoc}
     */
    protected const TABLE_FIELDS = [
        'id',
        'content',
        'isValidated',
        'postId',
        'userId',
        'createdAt',
        'updatedAt',
    ];
}