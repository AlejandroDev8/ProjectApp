<?php

namespace App\Enums;

enum CourseStatus: int
{
    case DRAFT = 0;
    case PENDING = 1;
    case PUBLISHED = 2;
}
