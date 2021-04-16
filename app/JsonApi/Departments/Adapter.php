<?php

namespace App\JsonApi\Departments;

use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{
    protected $defaultPagination = 10;

    protected $fillable = ['title'];

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [
        'title' => 'name',
    ];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        $paging->withPageKey('number')->withPerPageKey('size');
        parent::__construct(new \App\Models\Department(), $paging);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $this->filterWithScopes($query, $filters);
    }

    public function employees(): \CloudCreativity\LaravelJsonApi\Eloquent\HasMany
    {
        return $this->hasMany();
    }

    public function managers(): \CloudCreativity\LaravelJsonApi\Eloquent\HasMany
    {
        return $this->hasMany();
    }
}
