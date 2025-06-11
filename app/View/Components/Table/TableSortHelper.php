<?php

namespace App\View\Components\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TableSortHelper
{
    /**
     * @return array<string,mixed>
     */
    public static function sortUrl(string $column): array
    {
        $sorts = Request::input('sort', []);
        $direction = $sorts[$column] ?? null;

        $nextDirection = match ($direction) {
            'asc' => 'desc',
            'desc' => null,
            default => 'asc',
        };

        $newSorts = $sorts;
        if ($nextDirection) {
            $newSorts[$column] = $nextDirection;
        } else {
            unset($newSorts[$column]);
        }

        $url = Request::fullUrlWithQuery(['sort' => $newSorts]);

        return [
            'url' => $url,
            'direction' => $direction,
        ];
    }

    /**
     * @param Builder<Model> $query
     */
    public static function applySorting(Builder $query): void
    {
        $sorts = request()->input('sort', []);
        foreach ($sorts as $column => $direction) {
            if (in_array($direction, ['asc', 'desc'])) {
                $query->orderBy($column, $direction);
            }
        }
    }
}

