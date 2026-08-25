<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Model;

use Infrawrench\Sdk\Internal\Coerce;

final class QueryMonitorTargetAccount implements \JsonSerializable
{
    /**
     * @param bool $accountSql The account itself has a SQL driver, so it is a valid target on its own.
     * @param list<QueryMonitorTargetResource> $resources
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly bool $accountSql,
        public readonly array $resources,
    ) {
    }

    /**
     * Build one from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            accountSql: Coerce::toBool($data['accountSql'] ?? null),
            resources: Coerce::mapList($data['resources'] ?? null, static fn (mixed $item): QueryMonitorTargetResource => QueryMonitorTargetResource::fromArray(Coerce::toArray($item))),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'accountSql' => $this->accountSql,
            'resources' => array_map(static fn (QueryMonitorTargetResource $item): array => $item->toArray(), $this->resources),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
