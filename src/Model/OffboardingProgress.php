<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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

final class OffboardingProgress implements \JsonSerializable
{
    /**
     * @param int $total Rows on the checklist, rejected matches excluded.
     * @param int $resolved Done, skipped or gone.
     * @param int $unconfirmed Possible matches still waiting for a person to confirm or reject them.
     */
    public function __construct(
        public readonly int $total,
        public readonly int $resolved,
        public readonly int $open,
        public readonly int $failed,
        public readonly int $unconfirmed,
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
            total: Coerce::toInt($data['total'] ?? null),
            resolved: Coerce::toInt($data['resolved'] ?? null),
            open: Coerce::toInt($data['open'] ?? null),
            failed: Coerce::toInt($data['failed'] ?? null),
            unconfirmed: Coerce::toInt($data['unconfirmed'] ?? null),
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
            'total' => $this->total,
            'resolved' => $this->resolved,
            'open' => $this->open,
            'failed' => $this->failed,
            'unconfirmed' => $this->unconfirmed,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
