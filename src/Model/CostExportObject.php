<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

final class CostExportObject implements \JsonSerializable
{
    /**
     * @param string $periodStart The period's first day, in the export's own timezone.
     * @param string $key `{prefix}/cost-export/{exportId}/{cadence}/{periodStart}.{format}`. Deterministic, so re-exporting a restated period overwrites this object instead of adding a second copy.
     */
    public function __construct(
        public readonly string $periodStart,
        public readonly string $from,
        public readonly string $to,
        public readonly string $key,
        public readonly int $rowCount,
        public readonly int $byteCount,
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
            periodStart: Coerce::toString($data['periodStart'] ?? null),
            from: Coerce::toString($data['from'] ?? null),
            to: Coerce::toString($data['to'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            rowCount: Coerce::toInt($data['rowCount'] ?? null),
            byteCount: Coerce::toInt($data['byteCount'] ?? null),
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
            'periodStart' => $this->periodStart,
            'from' => $this->from,
            'to' => $this->to,
            'key' => $this->key,
            'rowCount' => $this->rowCount,
            'byteCount' => $this->byteCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
