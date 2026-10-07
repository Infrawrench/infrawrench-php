<?php

/*
 * infrawrench/sdk v1.76.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.76.0).
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

final class VirtualTagRule implements \JsonSerializable
{
    /**
     * @param 'value'|'tag'|'split'|'metric_split' $kind `value`: a fixed value. `tag`: copy the value from the first present provider tag key in `sources` (key collapsing). `split`: divide the row across `allocations` by percentage. `metric_split`: divide it in proportion to business metrics, day by day.
     * @param string|null $query Cost-query-language filter a row must match, e.g. `provider = 'aws' AND service = 'AmazonRDS'`. Empty matches every row. May not reference another virtual tag.
     * @param string|null $startsOn Inclusive UTC day the rule starts applying; null for no start.
     * @param string|null $endsOn Inclusive UTC day the rule stops applying; null for no end.
     * @param string|null $value `value` only.
     * @param list<VirtualTagSource>|null $sources `tag` only.
     * @param 'none'|'lower'|'upper'|null $valueTransform `tag` only. Case fold applied to the copied value before the prefix.
     * @param list<VirtualTagAllocation>|null $allocations `split` and `metric_split` only; at least two.
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?string $query = null,
        public readonly ?string $description = null,
        public readonly ?string $startsOn = null,
        public readonly ?string $endsOn = null,
        public readonly ?string $value = null,
        public readonly ?array $sources = null,
        public readonly ?string $valueTransform = null,
        public readonly ?array $allocations = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            query: Coerce::toStringOrNull($data['query'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            startsOn: Coerce::toStringOrNull($data['startsOn'] ?? null),
            endsOn: Coerce::toStringOrNull($data['endsOn'] ?? null),
            value: Coerce::toStringOrNull($data['value'] ?? null),
            sources: Coerce::nullable($data['sources'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): VirtualTagSource => VirtualTagSource::fromArray(Coerce::toArray($item)))),
            valueTransform: Coerce::toStringOrNull($data['valueTransform'] ?? null),
            allocations: Coerce::nullable($data['allocations'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): VirtualTagAllocation => VirtualTagAllocation::fromArray(Coerce::toArray($item)))),
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
            'kind' => $this->kind,
        ];
        if ($this->query !== null) {
            $payload['query'] = $this->query;
        }
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->startsOn !== null) {
            $payload['startsOn'] = $this->startsOn;
        }
        if ($this->endsOn !== null) {
            $payload['endsOn'] = $this->endsOn;
        }
        if ($this->value !== null) {
            $payload['value'] = $this->value;
        }
        if ($this->sources !== null) {
            $payload['sources'] = array_map(static fn (VirtualTagSource $item): array => $item->toArray(), $this->sources);
        }
        if ($this->valueTransform !== null) {
            $payload['valueTransform'] = $this->valueTransform;
        }
        if ($this->allocations !== null) {
            $payload['allocations'] = array_map(static fn (VirtualTagAllocation $item): array => $item->toArray(), $this->allocations);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
