<?php

namespace App\View\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * @var Builder
     */
    public Builder $query;

    /**
     * @var Column[]
     */
    public array $columns;

    /**
     * Optional JS onClick handler name or inline function string
     *
     * @var string|null
     */
    public ?string $onclick;

    /**
     * Optional route
     *
     * @var string|null
     */
    public ?string $href;


    /**
     * @param Builder<Model> $query
     * @param array<int,mixed> $columns
     * @param ?string $onClick
     */
    public function __construct(Builder $query, array $columns = [], ?string $onclick = null, ?string $href = null)
    {
        $this->query = $query;
        $this->columns = $columns;
        $this->onclick = $onclick;
        $this->href = $href;

        $sorts = request()->input('sort', []);
        $search = request()->input('search', '');

        if($search) {
            $search = strtolower($search);
            $this->query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $column) {
                    if ($column->searchable) {
                        $q->orWhereRaw('LOWER(' . $column->key . ') LIKE ?', ["%{$search}%"]);
                    }
                }
            });
        }

        foreach ($sorts as $column => $direction) {
            if (in_array($column, collect($columns)->pluck('key')->all())) {
                $direction = strtolower($direction) === 'desc' ? 'desc' : 'asc';
                $query->orderBy($column, $direction);
            }
        }

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.table', [
            'columns' => $this->columns,
            'onRowClick' => $this->onclick,
        ]);
    }
}
