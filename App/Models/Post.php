<?php

namespace Blog\Models;

use Blog\Models\Traits\HydratorTrait;
use Blog\Models\Traits\TimestampableTrait;

class Post
{
    use HydratorTrait;
    use TimestampableTrait;
}