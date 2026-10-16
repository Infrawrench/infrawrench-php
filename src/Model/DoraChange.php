<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

final class DoraChange implements \JsonSerializable
{
    /**
     * @param 'deploy'|'resource_change' $type
     * @param 'success'|'failure'|'in_progress'|'canceled' $status
     * @param DoraSource::* $source
     * @param array<string, DoraScopeValue|null> $scope Dimension id to value; null where the dimension is not known for this change.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly string $name,
        public readonly ?string $environment,
        public readonly ?string $repository,
        public readonly ?string $commitSha,
        public readonly string $at,
        public readonly string $status,
        public readonly string $source,
        public readonly ?string $pluginId,
        public readonly ?string $url,
        public readonly bool $isRollback,
        public readonly ?float $leadTimeHours,
        public readonly ?DoraFailure $failure,
        public readonly array $scope,
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
            type: Coerce::toString($data['type'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            environment: Coerce::toStringOrNull($data['environment'] ?? null),
            repository: Coerce::toStringOrNull($data['repository'] ?? null),
            commitSha: Coerce::toStringOrNull($data['commitSha'] ?? null),
            at: Coerce::toString($data['at'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
            isRollback: Coerce::toBool($data['isRollback'] ?? null),
            leadTimeHours: Coerce::toFloatOrNull($data['leadTimeHours'] ?? null),
            failure: Coerce::nullable($data['failure'] ?? null, static fn (mixed $value): DoraFailure => DoraFailure::fromArray(Coerce::toArray($value))),
            scope: Coerce::mapValues($data['scope'] ?? null, static fn (mixed $item): ?DoraScopeValue => Coerce::nullable($item, static fn (mixed $value): DoraScopeValue => DoraScopeValue::fromArray(Coerce::toArray($value)))),
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
            'type' => $this->type,
            'name' => $this->name,
            'environment' => $this->environment,
            'repository' => $this->repository,
            'commitSha' => $this->commitSha,
            'at' => $this->at,
            'status' => $this->status,
            'source' => $this->source,
            'pluginId' => $this->pluginId,
            'url' => $this->url,
            'isRollback' => $this->isRollback,
            'leadTimeHours' => $this->leadTimeHours,
            'failure' => $this->failure?->toArray(),
            'scope' => array_map(static fn (?DoraScopeValue $item): array => $item?->toArray(), $this->scope),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
