<?php

namespace App;

enum FormTypeEnum: string
{
    case CONTACT = 'CONTACT';
    case PROJECT = 'PROJECT';
    case PORTFOLIO = 'PORTFOLIO';
    case JOB = 'JOB';
    case BUY_SELL = 'BUY_SELL';
}
