<?php

namespace App;

enum RealestateStatus: string
{
    case AVAILABLE = 'mevcut';
    case RESERVED = 'reserve';

    case SOLD = 'satıldı';
}
