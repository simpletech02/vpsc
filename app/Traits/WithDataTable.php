<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

trait WithDataTable
{
    use WithPagination;

    public $sorts = [];

    protected $paginationTheme = 'bootstrap';


    public function changeSort(string $field)
    {
        if (($this->sorts[$field] ?? null) === null) {
            $this->sorts[$field] = 'desc';
        } elseif ($this->sorts[$field] === 'desc') {
            $this->sorts[$field] = 'asc';
        } else {
            unset($this->sorts[$field]);
        }
    }

    protected function withSorts(Builder $query): Builder
    {
        return $query->unless(empty($this->sorts), function (Builder $builder) {
            foreach ($this->sorts as $sort => $direction) {
                $builder->orderBy($sort, $direction);
            }
        });
    }
}
