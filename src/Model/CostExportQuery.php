<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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

/**
 * The rows a run selects. Reuses the same `CostFilter` and dimension vocabulary the dashboards,
 * budgets and cost reports store, so a filter means the same thing everywhere.
 */
final class CostExportQuery implements \JsonSerializable
{
    /**
     * @param list<'provider'|'account'|'service'|'region'|'resource'|'tag'|'charge_type'|'commitment'> $dimensions Row-identity columns kept in the output. Dropping one aggregates over it — an export grouped to provider + service is orders of magnitude smaller than a per-resource one.
     * @param list<string> $tagKeys Tag keys emitted as their own `tag_<key>` columns.
     * @param list<CostExportFilter> $filters
     * @param list<string>|null $chargeTypes
     * @param 'cash'|'amortized'|null $costBasis
     */
    public function __construct(
        public readonly float $version,
        public readonly array $dimensions,
        public readonly array $tagKeys,
        public readonly array $filters,
        public readonly ?array $chargeTypes = null,
        public readonly ?string $costBasis = null,
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
            version: Coerce::toFloat($data['version'] ?? null),
            dimensions: Coerce::mapList($data['dimensions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            tagKeys: Coerce::mapList($data['tagKeys'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            filters: Coerce::mapList($data['filters'] ?? null, static fn (mixed $item): CostExportFilter => CostExportFilter::fromArray(Coerce::toArray($item))),
            chargeTypes: Coerce::nullable($data['chargeTypes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            costBasis: Coerce::toStringOrNull($data['costBasis'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'version' => $this->version,
            'dimensions' => $this->dimensions,
            'tagKeys' => $this->tagKeys,
            'filters' => array_map(static fn (CostExportFilter $item): array => $item->toArray(), $this->filters),
        ];
        if ($this->chargeTypes !== null) {
            $payload['chargeTypes'] = $this->chargeTypes;
        }
        if ($this->costBasis !== null) {
            $payload['costBasis'] = $this->costBasis;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
