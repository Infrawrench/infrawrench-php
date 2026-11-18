<?php

/*
 * infrawrench/sdk v1.118.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.118.0).
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

final class CommitmentReportPoint implements \JsonSerializable
{
    /** @param string $bucket The bucket's first day, `YYYY-MM-DD`. */
    public function __construct(
        public readonly string $bucket,
        public readonly CommitmentReportTotals $totals,
        public readonly CommitmentReportMetricValues $metrics,
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
            bucket: Coerce::toString($data['bucket'] ?? null),
            totals: CommitmentReportTotals::fromArray(Coerce::toArray($data['totals'] ?? null)),
            metrics: CommitmentReportMetricValues::fromArray(Coerce::toArray($data['metrics'] ?? null)),
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
            'bucket' => $this->bucket,
            'totals' => $this->totals->toArray(),
            'metrics' => $this->metrics->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
