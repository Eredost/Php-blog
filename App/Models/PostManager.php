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

    /**
     * Find one article with his number of comments and the name of the author
     *
     * @param $id
     *
     * @return mixed
     */
    public static function findOnePostWithAuthorName($id)
    {
        $sql = "
            SELECT p.id, p.title, p.summary, p.image, p.content, p.createdAt, p.updatedAt, u.username
                FROM post AS p
                LEFT JOIN user AS u
                    ON p.userId = u.id
                WHERE p.id = :id;
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->prepare($sql);
        $request->execute([
            'id' => $id
        ]);

        return $request->fetchObject(Post::class);
    }

    /**
     * Retrieves essential information from the last five articles
     *
     * @return array
     */
    public static function findLastPosts(): array
    {
        $sql = "
            SELECT id, title, image, createdAt
                FROM post
                ORDER BY createdAt DESC
                LIMIT 5;
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->query($sql);

        return $request->fetchAll(\PDO::FETCH_CLASS, Post::class);
    }
}
