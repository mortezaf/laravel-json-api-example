<?php

namespace App\JsonApi\Salaries;

use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{

    protected $defaultPagination = 10;

    protected $fillable = ['emp_id','salary','fromDate','toDate'];

    protected $dates = ['fromDate','toDate'];

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [
        'emp_id' => 'employee_id',
        'fromDate' => 'from_date',
        'toDate' => 'to_date',
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
        parent::__construct(new \App\Models\Salary(), $paging);
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

    public function employee(): \CloudCreativity\LaravelJsonApi\Eloquent\BelongsTo
    {
        return $this->belongsTo();
    }
}
