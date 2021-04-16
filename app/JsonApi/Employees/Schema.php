<?php

namespace App\JsonApi\Employees;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'employees';

    /**
     * @param \App\Models\Employee $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Models\Employee $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource): array
    {
        return [
            'name' => $resource->first_name,
            'family' => $resource->last_name,
            'sex' => $resource->gender,
            'birthDate' => $resource->birth_date,
            'hiredAt' => $resource->hire_date,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships): array
    {
        return [
            'departments' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'managers' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'title' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'titles' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'salary' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'salaries' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
