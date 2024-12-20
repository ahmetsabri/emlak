<?php

namespace App;

enum TodoStatus: string
{
    case DOING = 'Yapılıyor';
    case DONE = 'Tamamlandı';
}
