<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class AccessReviewResponse implements \JsonSerializable
{
    /**
     * @param list<AccessPrincipal> $principals Every synced principal, by account then type then name. Never filtered by dismissals — accepting a finding must not remove a principal from the inventory.
     * @param list<AccessFinding> $findings Live findings, worst severity first. Dismissed findings are not included.
     * @param int $totalCount Live finding count; dismissals excluded.
     * @param list<DismissedAccessFinding> $dismissed Findings a dismissal is currently suppressing, most recently dismissed first. Only dismissals whose rule still matches appear.
     * @param int $unknownActivityCount How many principals the review could establish no last-use evidence for. Surfaces render this so "we found nothing" and "we could not look" do not read the same.
     * @param int $staleDays The staleness window this review was computed against.
     */
    public function __construct(
        public readonly array $principals,
        public readonly array $findings,
        public readonly int $totalCount,
        public readonly AccessReviewSeverityCounts $counts,
        public readonly AccessReviewRuleCounts $byRule,
        public readonly AccessReviewRoleCounts $byRole,
        public readonly array $dismissed,
        public readonly int $dismissedCount,
        public readonly int $unknownActivityCount,
        public readonly int $staleDays,
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
            principals: Coerce::mapList($data['principals'] ?? null, static fn (mixed $item): AccessPrincipal => AccessPrincipal::fromArray(Coerce::toArray($item))),
            findings: Coerce::mapList($data['findings'] ?? null, static fn (mixed $item): AccessFinding => AccessFinding::fromArray(Coerce::toArray($item))),
            totalCount: Coerce::toInt($data['totalCount'] ?? null),
            counts: AccessReviewSeverityCounts::fromArray(Coerce::toArray($data['counts'] ?? null)),
            byRule: AccessReviewRuleCounts::fromArray(Coerce::toArray($data['byRule'] ?? null)),
            byRole: AccessReviewRoleCounts::fromArray(Coerce::toArray($data['byRole'] ?? null)),
            dismissed: Coerce::mapList($data['dismissed'] ?? null, static fn (mixed $item): DismissedAccessFinding => DismissedAccessFinding::fromArray(Coerce::toArray($item))),
            dismissedCount: Coerce::toInt($data['dismissedCount'] ?? null),
            unknownActivityCount: Coerce::toInt($data['unknownActivityCount'] ?? null),
            staleDays: Coerce::toInt($data['staleDays'] ?? null),
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
            'principals' => array_map(static fn (AccessPrincipal $item): array => $item->toArray(), $this->principals),
            'findings' => array_map(static fn (AccessFinding $item): array => $item->toArray(), $this->findings),
            'totalCount' => $this->totalCount,
            'counts' => $this->counts->toArray(),
            'byRule' => $this->byRule->toArray(),
            'byRole' => $this->byRole->toArray(),
            'dismissed' => array_map(static fn (DismissedAccessFinding $item): array => $item->toArray(), $this->dismissed),
            'dismissedCount' => $this->dismissedCount,
            'unknownActivityCount' => $this->unknownActivityCount,
            'staleDays' => $this->staleDays,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
