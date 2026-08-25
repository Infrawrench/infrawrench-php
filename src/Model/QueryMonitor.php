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

final class QueryMonitor implements \JsonSerializable
{
    /**
     * @param 'scalar'|'rowCount' $mode How the result is reduced to one number. `scalar` reads the first column of the first row; `rowCount` counts the rows, which is what lets `SELECT … WHERE broken` be a monitor.
     * @param 'gt'|'gte'|'lt'|'lte'|'eq'|'neq' $operator
     * @param int $consecutiveBreaches Consecutive breaching runs before the alert fires. A query against a live table is a sample: a count that dips while a batch job is mid-write is not an incident, and a monitor that pages on it gets muted within a week.
     * @param 'ok'|'breaching'|'unknown' $state `unknown` is a first-class state, not an absence: a monitor whose query failed has not told you the data is fine, and rendering that as `ok` is how a broken monitor becomes indistinguishable from a healthy one.
     * @param string|null $lastError Why the last run said nothing. Kept apart from the state because 'the monitor is broken' and 'the data is bad' need different people.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $resourceId,
        public readonly ?string $resourceTypeId,
        public readonly ?string $resourceName,
        public readonly string $sql,
        public readonly string $mode,
        public readonly string $operator,
        public readonly float $threshold,
        public readonly int $intervalMinutes,
        public readonly int $consecutiveBreaches,
        public readonly bool $enabled,
        public readonly string $state,
        public readonly ?float $lastValue,
        public readonly ?string $lastRunAt,
        public readonly ?string $lastError,
        public readonly int $breachStreak,
        public readonly ?string $lastAlertedAt,
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
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            resourceName: Coerce::toStringOrNull($data['resourceName'] ?? null),
            sql: Coerce::toString($data['sql'] ?? null),
            mode: Coerce::toString($data['mode'] ?? null),
            operator: Coerce::toString($data['operator'] ?? null),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            intervalMinutes: Coerce::toInt($data['intervalMinutes'] ?? null),
            consecutiveBreaches: Coerce::toInt($data['consecutiveBreaches'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            lastValue: Coerce::toFloatOrNull($data['lastValue'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            breachStreak: Coerce::toInt($data['breachStreak'] ?? null),
            lastAlertedAt: Coerce::toStringOrNull($data['lastAlertedAt'] ?? null),
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
            'name' => $this->name,
            'description' => $this->description,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'resourceId' => $this->resourceId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceName' => $this->resourceName,
            'sql' => $this->sql,
            'mode' => $this->mode,
            'operator' => $this->operator,
            'threshold' => $this->threshold,
            'intervalMinutes' => $this->intervalMinutes,
            'consecutiveBreaches' => $this->consecutiveBreaches,
            'enabled' => $this->enabled,
            'state' => $this->state,
            'lastValue' => $this->lastValue,
            'lastRunAt' => $this->lastRunAt,
            'lastError' => $this->lastError,
            'breachStreak' => $this->breachStreak,
            'lastAlertedAt' => $this->lastAlertedAt,
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
