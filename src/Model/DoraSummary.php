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

final class DoraSummary implements \JsonSerializable
{
    /**
     * @param array{value: float|null, band: DoraBand::*, sample: int, deploys: int, days: float} $deploymentFrequency `value` is successful production deploys per day.
     * @param array{value: float|null, band: DoraBand::*, sample: int, p90Hours: float|null} $leadTime `value` is the median hours from commit to production.
     * @param array{value: float|null, band: DoraBand::*, sample: int, changes: int, failures: int} $changeFailureRate `value` is the share of production changes that failed, 0-1.
     * @param array{value: float|null, band: DoraBand::*, sample: int, restores: int} $timeToRestore `value` is the median hours from failure to recovery.
     */
    public function __construct(
        public readonly array $deploymentFrequency,
        public readonly array $leadTime,
        public readonly array $changeFailureRate,
        public readonly array $timeToRestore,
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
            deploymentFrequency: Coerce::toArray($data['deploymentFrequency'] ?? null),
            leadTime: Coerce::toArray($data['leadTime'] ?? null),
            changeFailureRate: Coerce::toArray($data['changeFailureRate'] ?? null),
            timeToRestore: Coerce::toArray($data['timeToRestore'] ?? null),
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
            'deploymentFrequency' => $this->deploymentFrequency,
            'leadTime' => $this->leadTime,
            'changeFailureRate' => $this->changeFailureRate,
            'timeToRestore' => $this->timeToRestore,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
