<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class ExchangeRateImportResult implements \JsonSerializable
{
    /**
     * @param bool $dryRun True when nothing was written.
     * @param bool $applied True when the rows were written.
     * @param list<array{line: int, action: 'create'|'update'|'unchanged'|'error', rate?: array<string, mixed>, previousRate?: string, previousEffectiveTo?: string|null, error?: string}> $rows
     * @param array{create: int, update: int, unchanged: int, error: int} $counts
     * @param string|null $fileError A problem with the file as a whole (a missing column, too many rows, the org's rate cap); `rows` is then empty or unapplied.
     */
    public function __construct(
        public readonly bool $dryRun,
        public readonly bool $applied,
        public readonly array $rows,
        public readonly array $counts,
        public readonly ?string $fileError,
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
            dryRun: Coerce::toBool($data['dryRun'] ?? null),
            applied: Coerce::toBool($data['applied'] ?? null),
            rows: Coerce::mapList($data['rows'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            counts: Coerce::toArray($data['counts'] ?? null),
            fileError: Coerce::toStringOrNull($data['fileError'] ?? null),
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
            'dryRun' => $this->dryRun,
            'applied' => $this->applied,
            'rows' => $this->rows,
            'counts' => $this->counts,
            'fileError' => $this->fileError,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
