<?php

namespace Blog\Models;

class PostManager extends AbstractManager
{
    /**
     * {@inheritdoc}
     */
    protected const TABLE_NAME = 'post';

    /**
     * {@inheritdoc}
     */
    protected const TABLE_FIELDS = [
        'id',
        'title',
        'summary',
        'image',
        'content',
        'userId',
        'createdAt',
        'updatedAt',
    ];
}