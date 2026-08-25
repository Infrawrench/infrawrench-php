<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class NetworkFlowRateCard implements \JsonSerializable
{
    /**
     * @param string $asOf Date the rates were last checked against the provider's pricing page.
     * @param array<string, float> $perGb
     * @param bool $queriesBillable True when collecting flows runs queries the provider bills to your cloud account.
     * @param bool $sampled True when the flow source samples rather than recording all flows.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $currency,
        public readonly string $asOf,
        public readonly array $perGb,
        public readonly bool $queriesBillable,
        public readonly bool $sampled,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            asOf: Coerce::toString($data['asOf'] ?? null),
            perGb: Coerce::mapValues($data['perGb'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            queriesBillable: Coerce::toBool($data['queriesBillable'] ?? null),
            sampled: Coerce::toBool($data['sampled'] ?? null),
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
            'pluginId' => $this->pluginId,
            'currency' => $this->currency,
            'asOf' => $this->asOf,
            'perGb' => $this->perGb,
            'queriesBillable' => $this->queriesBillable,
            'sampled' => $this->sampled,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
