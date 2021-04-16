<?php

namespace App\JsonApi\Departments;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'departments';

    /**
     * @param \App\Models\Department $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Models\Department $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'title' => $resource->name,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships): array
    {
        return [
            'employees' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'managers' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ]
        ];
    }
}
