<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

final class BackupKindCounts implements \JsonSerializable
{
    public function __construct(
        public readonly int $unprotected,
        public readonly int $rpoBreach,
        public readonly int $retentionBelowPolicy,
        public readonly int $orphanedSnapshot,
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
            unprotected: Coerce::toInt($data['unprotected'] ?? null),
            rpoBreach: Coerce::toInt($data['rpo-breach'] ?? null),
            retentionBelowPolicy: Coerce::toInt($data['retention-below-policy'] ?? null),
            orphanedSnapshot: Coerce::toInt($data['orphaned-snapshot'] ?? null),
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
            'unprotected' => $this->unprotected,
            'rpo-breach' => $this->rpoBreach,
            'retention-below-policy' => $this->retentionBelowPolicy,
            'orphaned-snapshot' => $this->orphanedSnapshot,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
