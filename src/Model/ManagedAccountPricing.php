<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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
 * Customer settings to try instead of the saved ones.
 *
 * The API may send `null` in place of this object.
 */
final class ManagedAccountPricing implements \JsonSerializable
{
    /**
     * @param array{enabled: bool, scope: list<array{pluginId: string, service?: string|null}>, fallbackUpliftPercent: float, uplifts: list<array{pluginId: string, service?: string|null, percent: float}>} $rerate Present usage at the provider's public on-demand list price instead of what the organisation actually paid. Applies to usage and commitment-covered usage lines only.
     */
    public function __construct(
        public readonly array $rerate,
        public readonly DiscountTreatment $discounts,
        public readonly DiscountTreatment $credits,
        public readonly DiscountTreatment $commitmentBenefits,
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
            rerate: Coerce::toArray($data['rerate'] ?? null),
            discounts: DiscountTreatment::fromArray(Coerce::toArray($data['discounts'] ?? null)),
            credits: DiscountTreatment::fromArray(Coerce::toArray($data['credits'] ?? null)),
            commitmentBenefits: DiscountTreatment::fromArray(Coerce::toArray($data['commitmentBenefits'] ?? null)),
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
            'rerate' => $this->rerate,
            'discounts' => $this->discounts->toArray(),
            'credits' => $this->credits->toArray(),
            'commitmentBenefits' => $this->commitmentBenefits->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
