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
                self::SHOW_DATA => isset($includeRelationships['departments']),
                self::DATA => function () use ($resource) {
                    return $resource->departments;
                }
            ],
            'managers' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['manager']),
                self::DATA => function () use ($resource) {
                    return $resource->managers;
                }
            ],
            'title' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['title']),
                self::DATA => function () use ($resource) {
                    return $resource->title;
                }
            ],
            'titles' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'salary' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['salary']),
                self::DATA => function () use ($resource) {
                    return $resource->salary;
                }
                ],
            'salaries' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
