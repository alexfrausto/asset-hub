<?php

namespace App\View\Components\Table;

enum ColumnType: string
{
    case Text = 'text';
    case Number = 'number';
    case Date = 'date';
    case Boolean = 'boolean';
}
