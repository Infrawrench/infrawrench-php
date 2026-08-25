<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class PostureListResponse implements \JsonSerializable
{
    /**
     * @param list<PostureFinding> $findings Live findings, worst severity first. Dismissed findings are not included.
     * @param int $totalCount Live finding count; dismissals excluded.
     * @param list<DismissedPostureFinding> $dismissed Findings a dismissal is currently suppressing, most recently dismissed first. Only dismissals whose rule still matches appear, so a finding that has since been fixed simply drops out.
     */
    public function __construct(
        public readonly array $findings,
        public readonly int $totalCount,
        public readonly PostureSeverityCounts $counts,
        public readonly array $dismissed,
        public readonly int $dismissedCount,
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
            findings: Coerce::mapList($data['findings'] ?? null, static fn (mixed $item): PostureFinding => PostureFinding::fromArray(Coerce::toArray($item))),
            totalCount: Coerce::toInt($data['totalCount'] ?? null),
            counts: PostureSeverityCounts::fromArray(Coerce::toArray($data['counts'] ?? null)),
            dismissed: Coerce::mapList($data['dismissed'] ?? null, static fn (mixed $item): DismissedPostureFinding => DismissedPostureFinding::fromArray(Coerce::toArray($item))),
            dismissedCount: Coerce::toInt($data['dismissedCount'] ?? null),
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
            'findings' => array_map(static fn (PostureFinding $item): array => $item->toArray(), $this->findings),
            'totalCount' => $this->totalCount,
            'counts' => $this->counts->toArray(),
            'dismissed' => array_map(static fn (DismissedPostureFinding $item): array => $item->toArray(), $this->dismissed),
            'dismissedCount' => $this->dismissedCount,
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
