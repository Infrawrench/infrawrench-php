<?php

/*
 * infrawrench/sdk v1.122.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.122.0).
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

final class LiveSealedQuery implements \JsonSerializable
{
    /**
     * @param string $capability Opaque encrypted capability. A bearer credential: keep it out of URLs and logs.
     * @param string $queryFingerprint Stable identity of the query; a renewal carries the same one.
     * @param float $expiresAt Unix milliseconds. Ask for a fresh ticket shortly before this to renew.
     */
    public function __construct(
        public readonly string $capability,
        public readonly string $queryFingerprint,
        public readonly float $expiresAt,
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
            capability: Coerce::toString($data['capability'] ?? null),
            queryFingerprint: Coerce::toString($data['queryFingerprint'] ?? null),
            expiresAt: Coerce::toFloat($data['expiresAt'] ?? null),
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
            'capability' => $this->capability,
            'queryFingerprint' => $this->queryFingerprint,
            'expiresAt' => $this->expiresAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
