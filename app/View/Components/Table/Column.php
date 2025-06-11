<?php

namespace App\View\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class Column
{
    public string $key;
    public string $label;
    public bool $sortable = true;
    public ColumnType $type = ColumnType::Text;
    public ?string $format = null;
    public bool $searchable = true;

    /**
     * @var string|HtmlString|View|null
     * Custom cell renderer (blade view name or raw HTML)
     */
    public string|HtmlString|View|null $renderer = null;

    public function __construct(string $key, string $label)
    {
        $this->key = $key;
        $this->label = $label;
        $this->type = ColumnType::Text;
    }

    public static function make(string $key, string $label): static
    {
        return new static($key, $label);
    }

    public function sortable(bool $sortable = true): static
    {
        $this->sortable = $sortable;
        return $this;
    }

    public function type(ColumnType $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function format(string $format): static
    {
        $this->format = $format;
        return $this;
    }

    public function renderer(string|View|HtmlString $renderer): static
    {
        $this->renderer = $renderer;
        return $this;
    }

    public function searchable(bool $searchable = true): static
    {
        $this->searchable = $searchable;
        return $this;
    }

    public function alignment(): string
    {
        return match ($this->type) {
            ColumnType::Number => 'text-right',
            ColumnType::Boolean => 'text-center',
            default => 'text-left',
        };
    }

    public function getContents(Model $row): string|View|HtmlString
    {
        if ($this->renderer) {
            if ($this->renderer instanceof View) {
                return $this->renderer->with(['row' => $row]);
            }
            return new HtmlString($this->renderer);
        }

        if ($this->type === ColumnType::Boolean) {
            return $row->{$this->key} ? 'Yes' : 'No';
        }

        if ($this->type === ColumnType::Date) {
            return $row->{$this->key}->format($this->format ?? 'Y-m-d H:i:s');
        }

        if ($this->type === ColumnType::Number) {
            $decimalPlaces = substr_count($this->format ?? '0,0.00', '.');
            return number_format($row->{$this->key}, $decimalPlaces, '.', ',');
        }

        return (string)$row->{$this->key};
    }
}

