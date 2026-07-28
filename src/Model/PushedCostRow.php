<?php

/*
 * infrawrench/sdk v0.12.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.12.0).
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

final class PushedCostRow implements \JsonSerializable
{
    /**
     * @param string $date UTC day the spend belongs to.
     * @param float $amount Money for this day/dimension combination. Negative for credits.
     * @param string|null $service Becomes a group/filter value.
     * @param string|null $resourceId Opaque id of the thing being billed; groups the `resource` dimension.
     * @param array<string, string>|null $tags Cost-allocation tags, at most 32. Keys starting with `infrawrench:` are reserved and rejected.
     * @param string|null $accountId Attribute this row to a connected account. Must belong to the calling organization. Omit to attribute it to the source itself.
     */
    public function __construct(
        public readonly string $date,
        public readonly string $currency,
        public readonly float $amount,
        public readonly ?string $service = null,
        public readonly ?string $region = null,
        public readonly ?string $resourceId = null,
        public readonly ?array $tags = null,
        public readonly ?float $usageAmount = null,
        public readonly ?string $usageUnit = null,
        public readonly ?string $accountId = null,
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
            date: Coerce::toString($data['date'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            amount: Coerce::toFloat($data['amount'] ?? null),
            service: Coerce::toStringOrNull($data['service'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            tags: Coerce::nullable($data['tags'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
            usageAmount: Coerce::toFloatOrNull($data['usageAmount'] ?? null),
            usageUnit: Coerce::toStringOrNull($data['usageUnit'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
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
            'date' => $this->date,
            'currency' => $this->currency,
            'amount' => $this->amount,
        ];
        if ($this->service !== null) {
            $payload['service'] = $this->service;
        }
        if ($this->region !== null) {
            $payload['region'] = $this->region;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->tags !== null) {
            $payload['tags'] = $this->tags;
        }
        if ($this->usageAmount !== null) {
            $payload['usageAmount'] = $this->usageAmount;
        }
        if ($this->usageUnit !== null) {
            $payload['usageUnit'] = $this->usageUnit;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
