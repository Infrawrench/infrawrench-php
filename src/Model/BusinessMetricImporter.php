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
final class BusinessMetricImporter implements \JsonSerializable
{
    /**
     * @param array<string, string> $params
     * @param BusinessMetricImportSchedule::* $schedule
     * @param BusinessMetricImportAggregation::* $aggregation
     * @param 'success'|'error'|null $lastStatus
     * @param int $consecutiveFailures Failed runs in a row; scheduling backs off on it and a success resets it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $metricId,
        public readonly string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $pluginId,
        public readonly ?string $sourceLabel,
        public readonly array $params,
        public readonly string $schedule,
        public readonly int $backfillDays,
        public readonly string $timezone,
        public readonly string $aggregation,
        public readonly bool $enabled,
        public readonly ?string $nextRunAt,
        public readonly ?string $lastRunAt,
        public readonly ?string $lastStatus,
        public readonly ?string $lastError,
        public readonly int $consecutiveFailures,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            metricId: Coerce::toString($data['metricId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            sourceLabel: Coerce::toStringOrNull($data['sourceLabel'] ?? null),
            params: Coerce::mapValues($data['params'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            schedule: Coerce::toString($data['schedule'] ?? null),
            backfillDays: Coerce::toInt($data['backfillDays'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            aggregation: Coerce::toString($data['aggregation'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            nextRunAt: Coerce::toStringOrNull($data['nextRunAt'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            lastStatus: Coerce::toStringOrNull($data['lastStatus'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            consecutiveFailures: Coerce::toInt($data['consecutiveFailures'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'metricId' => $this->metricId,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'sourceLabel' => $this->sourceLabel,
            'params' => $this->params,
            'schedule' => $this->schedule,
            'backfillDays' => $this->backfillDays,
            'timezone' => $this->timezone,
            'aggregation' => $this->aggregation,
            'enabled' => $this->enabled,
            'nextRunAt' => $this->nextRunAt,
            'lastRunAt' => $this->lastRunAt,
            'lastStatus' => $this->lastStatus,
            'lastError' => $this->lastError,
            'consecutiveFailures' => $this->consecutiveFailures,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
