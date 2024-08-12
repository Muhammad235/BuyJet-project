<?php

namespace App\Enums;

enum Status: string
{
    const ADMIN = 'admin';
    const USER = 'user';
    const ACTIVE = 1;
    const INACTIVE = 0;
    const OPEN = 'open';
    const CLOSED = 'closed';
    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';

    const SUCCESS = '1';
    const PENDIDNG = '2';
    const FAILED = '0';

    const YES = 1;
    const No = 0;
}
