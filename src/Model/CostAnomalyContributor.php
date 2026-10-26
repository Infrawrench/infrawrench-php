<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class CostAnomalyContributor implements \JsonSerializable
{
    /**
     * @param 'resource'|'account'|'region'|'usage_unit'|'charge_type'|'tag' $facet Which breakdown this value belongs to. Each facet partitions the anomaly's spend, so within a facet the deltas add up to the anomaly's rise.
     * @param string $key The value as cost rows carry it: an account id, a region, the provider-native resource id, a usage unit, a charge type or a tag value. Empty for rows with no value and for the folded `other` row.
     * @param string|null $tagKey The tag key, for the `tag` facet; null otherwise.
     * @param string $label Display name: the account's or synced resource's name where known, else `key`.
     * @param string|null $accountId The one account this value's spend sits in; null when it spans several.
     * @param array{id: string, accountId: string, pluginId: string, resourceTypeId: string, name: string}|null $resource The synced inventory resource a `resource` contributor's provider id matched, for a link to its detail page; null when it was never synced.
     * @param int $actualCents Spend on the anomalous day, in cents.
     * @param int $baselineCents Mean daily spend over the same 28-day baseline the detector used, in cents.
     * @param int $deltaCents `actualCents - baselineCents`.
     * @param float|null $share `deltaCents` as a share of the anomaly's whole rise (0 to 1; above 1 when other values fell). Null when the scope did not rise as a whole.
     * @param bool|null $other True for the row standing in for contributors outside the caller's cost visibility scope: their amounts summed, their names withheld.
     */
    public function __construct(
        public readonly string $facet,
        public readonly string $key,
        public readonly ?string $tagKey,
        public readonly string $label,
        public readonly ?string $accountId,
        public readonly ?array $resource,
        public readonly int $actualCents,
        public readonly int $baselineCents,
        public readonly int $deltaCents,
        public readonly ?float $share,
        public readonly ?bool $other = null,
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
            facet: Coerce::toString($data['facet'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resource: Coerce::toArrayOrNull($data['resource'] ?? null),
            actualCents: Coerce::toInt($data['actualCents'] ?? null),
            baselineCents: Coerce::toInt($data['baselineCents'] ?? null),
            deltaCents: Coerce::toInt($data['deltaCents'] ?? null),
            share: Coerce::toFloatOrNull($data['share'] ?? null),
            other: Coerce::toBoolOrNull($data['other'] ?? null),
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
            'facet' => $this->facet,
            'key' => $this->key,
            'tagKey' => $this->tagKey,
            'label' => $this->label,
            'accountId' => $this->accountId,
            'resource' => $this->resource,
            'actualCents' => $this->actualCents,
            'baselineCents' => $this->baselineCents,
            'deltaCents' => $this->deltaCents,
            'share' => $this->share,
        ];
        if ($this->other !== null) {
            $payload['other'] = $this->other;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
