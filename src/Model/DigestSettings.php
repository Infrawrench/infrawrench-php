<?php

/*
 * infrawrench/sdk v0.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.25.0).
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

final class DigestSettings implements \JsonSerializable
{
    /**
     * @param bool $enabled Whether the weekly digest is enabled for this organization. Delivery targets are the Slack channels and Teams webhooks whose weeklyDigest trigger is on.
     * @param string|null $lastSentWeekStart Monday (ISO date, UTC) of the last week a digest covered, or null when none has been sent.
     * @param string|null $lastSentAt When the last digest was sent, or null when none has been sent.
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly ?string $lastSentWeekStart,
        public readonly ?string $lastSentAt,
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
            lastSentWeekStart: Coerce::toStringOrNull($data['lastSentWeekStart'] ?? null),
            lastSentAt: Coerce::toStringOrNull($data['lastSentAt'] ?? null),
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
            'lastSentWeekStart' => $this->lastSentWeekStart,
            'lastSentAt' => $this->lastSentAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
