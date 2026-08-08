<?php

/*
 * infrawrench/sdk v0.43.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.43.0).
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

final class HygieneReport implements \JsonSerializable
{
    /**
     * @param int|null $auditHistoryDays How much audit history the organization actually has; null when it has none.
     * @param bool $permissionFindingsWithheld True when there was not enough audit history for the unused-permission finding to mean anything, so it was withheld rather than guessed at.
     * @param list<HygieneFinding> $findings
     * @param array{high: int, medium: int, low: int, total: int} $counts
     */
    public function __construct(
        public readonly string $generatedAt,
        public readonly int $windowDays,
        public readonly ?int $auditHistoryDays,
        public readonly bool $permissionFindingsWithheld,
        public readonly array $findings,
        public readonly array $counts,
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
            windowDays: Coerce::toInt($data['windowDays'] ?? null),
            auditHistoryDays: Coerce::toIntOrNull($data['auditHistoryDays'] ?? null),
            permissionFindingsWithheld: Coerce::toBool($data['permissionFindingsWithheld'] ?? null),
            findings: Coerce::mapList($data['findings'] ?? null, static fn (mixed $item): HygieneFinding => HygieneFinding::fromArray(Coerce::toArray($item))),
            counts: Coerce::toArray($data['counts'] ?? null),
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
            'windowDays' => $this->windowDays,
            'auditHistoryDays' => $this->auditHistoryDays,
            'permissionFindingsWithheld' => $this->permissionFindingsWithheld,
            'findings' => array_map(static fn (HygieneFinding $item): array => $item->toArray(), $this->findings),
            'counts' => $this->counts,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
