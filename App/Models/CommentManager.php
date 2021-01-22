<?php

namespace Blog\Models;

use Blog\Utils\DBData;

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

    /**
     * Find all comments with the author's name according to a given article id
     *
     * @param int $id
     *
     * @return array
     */
    public static function findAllCommentsByPostId(int $id): array
    {
        $sql = "
            SELECT c.content, c.createdAt, u.username
                FROM comment AS c
                LEFT JOIN user AS u
                    ON c.userId = u.id
                WHERE c.postId = :id AND c.isValidated IS TRUE  
                ORDER BY createdAt DESC;
        ";
        $pdo = DBData::getDBH();
        $request = $pdo->prepare($sql);
        $request->execute([
            'id' => $id
        ]);

        return $request->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }
}