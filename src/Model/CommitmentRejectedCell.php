<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class CommitmentRejectedCell implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param 'presence'|'not_in_decline'|'floor'|'materiality' $gate First gate the cell failed, in evaluation order — the most actionable objection.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $service,
        public readonly string $region,
        public readonly string $currency,
        public readonly string $gate,
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
            service: Coerce::toString($data['service'] ?? null),
            region: Coerce::toString($data['region'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            gate: Coerce::toString($data['gate'] ?? null),
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
            'service' => $this->service,
            'region' => $this->region,
            'currency' => $this->currency,
            'gate' => $this->gate,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
