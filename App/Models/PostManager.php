<?php

namespace Blog\Models;

use Blog\Utils\DBData;

abstract class PostManager extends AbstractManager
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

    /**
     * Get all the articles with their number of comments and the name of the author
     *
     * @return array
     */
    public static function findAllPostWithAuthorAndCommentCount(): array
    {
        $sql = "
            SELECT p.id, p.title, p.summary, p.image, p.createdAt, p.updatedAt, u.username, COUNT(c.content) AS commentCount
                FROM post AS p
                LEFT JOIN user AS u 
                    ON p.userId = u.id
                LEFT JOIN comment AS c
                    ON p.id = c.postId AND c.isValidated IS TRUE
                GROUP BY p.id
                ORDER BY p.createdAt DESC;
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->query($sql);

        return $request->fetchAll(\PDO::FETCH_CLASS, Post::class);
    }
}
