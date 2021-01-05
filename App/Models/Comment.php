<?php

namespace Blog\Models;

use Blog\Models\Traits\HydratorTrait;
use Blog\Models\Traits\TimestampableTrait;

class Comment extends CommentManager
{
    use HydratorTrait;
    use TimestampableTrait;

    /** @var int $id */
    private $id;

    /** @var string $content */
    private $content;

    /** @var boolean $isValidated */
    private $isValidated;

    /** @var int $postId */
    private $postId;

    /** @var int $userId */
    private $userId;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Comment
     */
    protected function setId(int $id): Comment
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isValidated(): ?bool
    {
        return $this->isValidated;
    }

    /**
     * @param bool $isValidated
     *
     * @return Comment
     */
    public function setIsValidated(bool $isValidated): Comment
    {
        $this->isValidated = $isValidated;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPostId(): ?int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     *
     * @return Comment
     */
    public function setPostId(int $postId): Comment
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     *
     * @return Comment
     */
    public function setUserId(int $userId): Comment
    {
        $this->userId = $userId;

        return $this;
    }
}
