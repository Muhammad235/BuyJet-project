<?php

namespace App\Enums;

enum Status: string
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    const OPEN = open;
    const CLOSED = closed;
    const LOW = low;
    const MEDIUM = medium;
    const HIGH = high;
}
