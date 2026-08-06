<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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

/** Item count per severity; every bucket present, zeros included. */
final class ExpirySeverityCounts implements \JsonSerializable
{
    public function __construct(
        public readonly int $expired,
        public readonly int $critical,
        public readonly int $warning,
        public readonly int $upcoming,
        public readonly int $ok,
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
            expired: Coerce::toInt($data['expired'] ?? null),
            critical: Coerce::toInt($data['critical'] ?? null),
            warning: Coerce::toInt($data['warning'] ?? null),
            upcoming: Coerce::toInt($data['upcoming'] ?? null),
            ok: Coerce::toInt($data['ok'] ?? null),
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
            'expired' => $this->expired,
            'critical' => $this->critical,
            'warning' => $this->warning,
            'upcoming' => $this->upcoming,
            'ok' => $this->ok,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
