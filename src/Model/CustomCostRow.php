<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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
 * One day of spend for one dimension combination. Clients aggregate file lines to this grain
 * before sending: two rows with the same date, dimensions, tags and currency in one upload replace
 * each other rather than adding.
 */
final class CustomCostRow implements \JsonSerializable
{
    /**
     * @param float $amount Cash amount. Negative for credits.
     * @param string|null $subAccount The file's own account label; splits the account dimension within the source.
     * @param array<string, string>|null $tags At most 32. Keys starting with `infrawrench:` are reserved and rejected.
     * @param float|null $amortizedAmount Amortized (effective) cost, e.g. FOCUS EffectiveCost. Omit when unknown.
     */
    public function __construct(
        public readonly string $date,
        public readonly string $currency,
        public readonly float $amount,
        public readonly ?string $service = null,
        public readonly ?string $region = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $subAccount = null,
        public readonly ?array $tags = null,
        public readonly ?float $usageAmount = null,
        public readonly ?string $usageUnit = null,
        public readonly ?string $chargeType = null,
        public readonly ?float $amortizedAmount = null,
        public readonly ?string $commitmentId = null,
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
            subAccount: Coerce::toStringOrNull($data['subAccount'] ?? null),
            tags: Coerce::nullable($data['tags'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
            usageAmount: Coerce::toFloatOrNull($data['usageAmount'] ?? null),
            usageUnit: Coerce::toStringOrNull($data['usageUnit'] ?? null),
            chargeType: Coerce::toStringOrNull($data['chargeType'] ?? null),
            amortizedAmount: Coerce::toFloatOrNull($data['amortizedAmount'] ?? null),
            commitmentId: Coerce::toStringOrNull($data['commitmentId'] ?? null),
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
        if ($this->subAccount !== null) {
            $payload['subAccount'] = $this->subAccount;
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
        if ($this->chargeType !== null) {
            $payload['chargeType'] = $this->chargeType;
        }
        if ($this->amortizedAmount !== null) {
            $payload['amortizedAmount'] = $this->amortizedAmount;
        }
        if ($this->commitmentId !== null) {
            $payload['commitmentId'] = $this->commitmentId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
