<?php

namespace Blog\Models;

use Blog\Models\Traits\HydratorTrait;
use Blog\Models\Traits\TimestampableTrait;

class User
{
    use HydratorTrait;
    use TimestampableTrait;
}