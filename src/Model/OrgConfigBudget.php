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

final class OrgConfigBudget implements \JsonSerializable
{
    /**
     * @param string $key Stable slug identifying this entity across organizations. Derived from the name on export; it is what an apply matches on, so renaming an entity while keeping its key is a rename rather than a delete-and-create.
     * @param list<array{type: 'actual'|'forecast', percent: int}> $thresholds
     * @param list<OrgConfigCostFilter>|null $filters
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly int $amountCents,
        public readonly array $thresholds,
        public readonly ?string $currency = null,
        public readonly ?array $filters = null,
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
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            amountCents: Coerce::toInt($data['amountCents'] ?? null),
            thresholds: Coerce::mapList($data['thresholds'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            filters: Coerce::nullable($data['filters'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigCostFilter => OrgConfigCostFilter::fromArray(Coerce::toArray($item)))),
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
            'key' => $this->key,
            'name' => $this->name,
            'amountCents' => $this->amountCents,
            'thresholds' => $this->thresholds,
        ];
        if ($this->currency !== null) {
            $payload['currency'] = $this->currency;
        }
        if ($this->filters !== null) {
            $payload['filters'] = array_map(static fn (OrgConfigCostFilter $item): array => $item->toArray(), $this->filters);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
