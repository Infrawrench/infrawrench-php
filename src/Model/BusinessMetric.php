<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class BusinessMetric implements \JsonSerializable
{
    /**
     * @param BusinessMetricKind::* $kind
     * @param list<BusinessMetricScopeTerm> $costScope
     */
    public function __construct(
        public readonly string $id,
        public readonly string $key,
        public readonly string $name,
        public readonly string $unit,
        public readonly ?string $description,
        public readonly string $kind,
        public readonly ?string $currency,
        public readonly array $costScope,
        public readonly ?string $savedFilterId,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?BusinessMetricCoverage $coverage,
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
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            unit: Coerce::toString($data['unit'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            costScope: Coerce::mapList($data['costScope'] ?? null, static fn (mixed $item): BusinessMetricScopeTerm => BusinessMetricScopeTerm::fromArray(Coerce::toArray($item))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            coverage: Coerce::nullable($data['coverage'] ?? null, static fn (mixed $value): BusinessMetricCoverage => BusinessMetricCoverage::fromArray(Coerce::toArray($value))),
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
            'key' => $this->key,
            'name' => $this->name,
            'unit' => $this->unit,
            'description' => $this->description,
            'kind' => $this->kind,
            'currency' => $this->currency,
            'costScope' => array_map(static fn (BusinessMetricScopeTerm $item): array => $item->toArray(), $this->costScope),
            'savedFilterId' => $this->savedFilterId,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'coverage' => $this->coverage?->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
