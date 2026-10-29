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

final class SavingsFindingsResponse implements \JsonSerializable
{
    /**
     * @param list<SavingsFinding> $findings Matching findings, filtered and sorted.
     * @param list<array{kind: SavingsFindingKind::*, error: string}> $unavailable Finders that failed to compute this time; their findings are not fixed.
     */
    public function __construct(
        public readonly array $findings,
        public readonly SavingsFindingsSummary $summary,
        public readonly array $unavailable,
        public readonly string $generatedAt,
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
            findings: Coerce::mapList($data['findings'] ?? null, static fn (mixed $item): SavingsFinding => SavingsFinding::fromArray(Coerce::toArray($item))),
            summary: SavingsFindingsSummary::fromArray(Coerce::toArray($data['summary'] ?? null)),
            unavailable: Coerce::mapList($data['unavailable'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
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
            'findings' => array_map(static fn (SavingsFinding $item): array => $item->toArray(), $this->findings),
            'summary' => $this->summary->toArray(),
            'unavailable' => $this->unavailable,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
