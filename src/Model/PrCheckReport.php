<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

/** The API may send `null` in place of this object. */
final class PrCheckReport implements \JsonSerializable
{
    /**
     * @param list<array{path: string, kind: 'terraform'|'infrafile'|'kubernetes', status: 'added'|'modified'|'removed'|'renamed', analysed: bool, note: string|null}> $files
     * @param list<PrCheckChange> $changes
     * @param array{monthlyDelta: float|null, currency: string|null, partial: bool, pricedChanges: int, unpricedChanges: int, otherCurrencyChanges: int} $totals
     * @param array{touchedResources: int, dependants: int, highestSeverity: 'none'|'low'|'medium'|'high'|'unknown'|null} $blast
     * @param list<string> $notes
     */
    public function __construct(
        public readonly string $generatedAt,
        public readonly array $files,
        public readonly array $changes,
        public readonly array $totals,
        public readonly array $blast,
        public readonly array $notes,
        public readonly bool $truncated,
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
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
            files: Coerce::mapList($data['files'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            changes: Coerce::mapList($data['changes'] ?? null, static fn (mixed $item): PrCheckChange => PrCheckChange::fromArray(Coerce::toArray($item))),
            totals: Coerce::toArray($data['totals'] ?? null),
            blast: Coerce::toArray($data['blast'] ?? null),
            notes: Coerce::mapList($data['notes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            truncated: Coerce::toBool($data['truncated'] ?? null),
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
            'generatedAt' => $this->generatedAt,
            'files' => $this->files,
            'changes' => array_map(static fn (PrCheckChange $item): array => $item->toArray(), $this->changes),
            'totals' => $this->totals,
            'blast' => $this->blast,
            'notes' => $this->notes,
            'truncated' => $this->truncated,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
