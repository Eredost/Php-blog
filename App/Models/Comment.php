<?php

namespace Blog\Models;

use Blog\Models\Traits\HydratorTrait;
use Blog\Models\Traits\TimestampableTrait;

class Comment
{
    use HydratorTrait;
    use TimestampableTrait;
}