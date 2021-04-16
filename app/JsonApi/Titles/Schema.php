<?php

namespace App\JsonApi\Titles;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'titles';

    /**
     * @param \App\Models\Title $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Models\Title $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'emp_id' => $resource->employee_id,
            'title' => $resource->title,
            'fromDate' => $resource->from_date,
            'toDate'=> $resource->to_date,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships): array
    {
        return [
            'employee' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ]
        ];
    }
}
