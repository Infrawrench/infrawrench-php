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

final class ExpiryAlertSettings implements \JsonSerializable
{
    /**
     * @param bool $enabled Whether the poller sends expiry alerts for this organization at all.
     * @param int $leadDays Days of lead time before a deadline counts as `upcoming` and alertable. Default 60.
     * @param string|null $lastNotifiedAt When the organization's expiry alert scan last completed, or null before the first. Owned by the poller's cooldown claim; not writable through this API.
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly int $leadDays,
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
            leadDays: Coerce::toInt($data['leadDays'] ?? null),
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
            'leadDays' => $this->leadDays,
            'lastNotifiedAt' => $this->lastNotifiedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
