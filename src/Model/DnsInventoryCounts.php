<?php

/*
 * infrawrench/sdk v1.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.14.0).
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

/** Record counts per status; zones counted separately. */
final class DnsInventoryCounts implements \JsonSerializable
{
    public function __construct(
        public readonly int $zones,
        public readonly int $records,
        public readonly int $owned,
        public readonly int $dangling,
        public readonly int $external,
        public readonly int $notAnalysed,
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
            zones: Coerce::toInt($data['zones'] ?? null),
            records: Coerce::toInt($data['records'] ?? null),
            owned: Coerce::toInt($data['owned'] ?? null),
            dangling: Coerce::toInt($data['dangling'] ?? null),
            external: Coerce::toInt($data['external'] ?? null),
            notAnalysed: Coerce::toInt($data['notAnalysed'] ?? null),
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
            'zones' => $this->zones,
            'records' => $this->records,
            'owned' => $this->owned,
            'dangling' => $this->dangling,
            'external' => $this->external,
            'notAnalysed' => $this->notAnalysed,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
