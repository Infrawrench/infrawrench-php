<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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

final class BusinessMetricInput implements \JsonSerializable
{
    /**
     * @param string $key Stable lowercase slug (letters, digits, `_ . -`) that workflows and the CLI address the metric by. Unique per organization among live metrics, and independent of `name` so a rename never breaks a running job.
     * @param string $unit Singular unit label used for display — the noun in "USD per customer".
     * @param BusinessMetricKind::* $kind
     * @param string|null $currency ISO-4217 code. **Required when `kind` is `currency`, and rejected otherwise** — a revenue metric with no currency cannot have margin computed against it, and a count metric carrying one would suggest its numbers are money when they are requests.
     * @param list<BusinessMetricScopeTerm>|null $costScope The spend this metric divides, in the same filter vocabulary cost graphs and budgets use. Empty (the default) is all of the organization's spend. A unit-cost query may narrow this further but can never widen it: the scope is part of what the metric means, and a caller who could drop it would be answering a different question under the same name.
     * @param string|null $savedFilterId A saved cost filter AND-composed with `costScope`, resolved server-side at query time. A reference that fails to resolve errors the unit-cost query rather than silently widening the numerator to all spend.
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly string $unit,
        public readonly string $kind,
        public readonly ?string $description = null,
        public readonly ?string $currency = null,
        public readonly ?array $costScope = null,
        public readonly ?string $savedFilterId = null,
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
            unit: Coerce::toString($data['unit'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            costScope: Coerce::nullable($data['costScope'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): BusinessMetricScopeTerm => BusinessMetricScopeTerm::fromArray(Coerce::toArray($item)))),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
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
            'unit' => $this->unit,
            'kind' => $this->kind,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->currency !== null) {
            $payload['currency'] = $this->currency;
        }
        if ($this->costScope !== null) {
            $payload['costScope'] = array_map(static fn (BusinessMetricScopeTerm $item): array => $item->toArray(), $this->costScope);
        }
        if ($this->savedFilterId !== null) {
            $payload['savedFilterId'] = $this->savedFilterId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
