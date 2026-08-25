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

final class QueryMonitorTestResult implements \JsonSerializable
{
    /**
     * @param 'ok'|'breaching'|'unknown' $state `unknown` is a first-class state, not an absence: a monitor whose query failed has not told you the data is fine, and rendering that as `ok` is how a broken monitor becomes indistinguishable from a healthy one.
     * @param list<array<string, mixed>> $rows Up to 20 rows, for the preview.
     */
    public function __construct(
        public readonly ?float $value,
        public readonly string $state,
        public readonly ?string $error,
        public readonly int $durationMs,
        public readonly array $rows,
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
            value: Coerce::toFloatOrNull($data['value'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            durationMs: Coerce::toInt($data['durationMs'] ?? null),
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'value' => $this->value,
            'state' => $this->state,
            'error' => $this->error,
            'durationMs' => $this->durationMs,
            'rows' => $this->rows,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
