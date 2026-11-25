<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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

final class CommitmentReportSeries implements \JsonSerializable
{
    /**
     * @param string $id Group key and currency, joined by U+0000: unique within a result.
     * @param string $groupKey The group's key: empty without grouping; a sentinel (`__on_demand__`, `__unattributed__`, `__unknown_kind__`) or the value otherwise.
     * @param string $label An account's name, a provider's display name or a holding's description where the server can name the key; the key itself otherwise (clients name kinds and sentinels).
     * @param list<CommitmentReportPoint> $points
     * @param array{totals: array<string, mixed>, metrics: array<string, mixed>} $total
     */
    public function __construct(
        public readonly string $id,
        public readonly string $groupKey,
        public readonly string $label,
        public readonly string $currency,
        public readonly array $points,
        public readonly array $total,
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
            id: Coerce::toString($data['id'] ?? null),
            groupKey: Coerce::toString($data['groupKey'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            points: Coerce::mapList($data['points'] ?? null, static fn (mixed $item): CommitmentReportPoint => CommitmentReportPoint::fromArray(Coerce::toArray($item))),
            total: Coerce::toArray($data['total'] ?? null),
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
            'id' => $this->id,
            'groupKey' => $this->groupKey,
            'label' => $this->label,
            'currency' => $this->currency,
            'points' => array_map(static fn (CommitmentReportPoint $item): array => $item->toArray(), $this->points),
            'total' => $this->total,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
