<?php

namespace Blog\Models;

use Blog\Models\Traits\HydratorTrait;
use Blog\Models\Traits\TimestampableTrait;

class User extends UserManager
{
    use HydratorTrait;
    use TimestampableTrait;

    /** @var int $id */
    private $id;

    /** @var string $username */
    private $username;

    /** @var string $email */
    private $email;

    /** @var string $role */
    private $role;

    /** @var string $password */
    private $password;

    public function __construct(array $data = [])
    {
        $this->createdAt = (new \DateTime())->format('Y-m-d H:i:s');
        $this->role = json_encode(['ROLE_USER']);

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
     * @return User
     */
    protected function setId(int $id): User
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     *
     * @return User
     */
    public function setRole(string $role): User
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;

        return $this;
    }
}
