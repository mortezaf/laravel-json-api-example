<?php

namespace App\JsonApi\Employees;

use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{
    protected $defaultPagination = 10;

    protected $fillable = ['name','family','sex','birthDate'];

    protected $guarded = ['hiredAt'];

    protected $dates = ['birthDate','hiredAt'];
    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'first_name',
        'family' => 'last_name',
        'sex' => 'gender',
        'birthDate' => 'birth_date',
        'hiredAt' => 'hire_date',
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
        parent::__construct(new \App\Models\Employee(), $paging);
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

    public function departments(): \CloudCreativity\LaravelJsonApi\Eloquent\HasMany
    {
        return $this->hasMany();
    }

    public function managers(): \CloudCreativity\LaravelJsonApi\Eloquent\HasMany
    {
        return $this->hasMany();
    }

    public function titles(): \CloudCreativity\LaravelJsonApi\Eloquent\HasMany
    {
        return $this->hasMany();
    }

    public function title(): \CloudCreativity\LaravelJsonApi\Eloquent\HasOne
    {
        return $this->hasOne();
    }

    public function salary(): \CloudCreativity\LaravelJsonApi\Eloquent\HasOne
    {
        return $this->hasOne();
    }

    public function salaries(): \CloudCreativity\LaravelJsonApi\Eloquent\HasMany
    {
        return $this->hasMany();
    }
}
