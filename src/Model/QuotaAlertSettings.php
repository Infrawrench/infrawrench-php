<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class QuotaAlertSettings implements \JsonSerializable
{
    /**
     * @param bool $enabled Whether the poller sends quota alerts for this organization at all.
     * @param float $threshold Utilisation fraction at or above which a quota alerts. Default 0.8. Bounded below at 0.5 (a lower threshold makes every quota critical) and above at 0.99 (at 1.0 the provider is already refusing requests, so the alert reports an outage rather than warning about one). Values outside the range are rejected, not clamped.
     * @param string|null $lastNotifiedAt When the organization's quota alert scan last completed, or null before the first. Owned by the poller's cooldown claim; not writable through this API.
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly float $threshold,
        public readonly ?string $lastNotifiedAt,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            lastNotifiedAt: Coerce::toStringOrNull($data['lastNotifiedAt'] ?? null),
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
            'enabled' => $this->enabled,
            'threshold' => $this->threshold,
            'lastNotifiedAt' => $this->lastNotifiedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
