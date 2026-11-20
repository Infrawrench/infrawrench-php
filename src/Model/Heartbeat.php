<?php

/*
 * infrawrench/sdk v1.123.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.123.0).
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

final class Heartbeat implements \JsonSerializable
{
    /**
     * @param 'cron'|'interval' $scheduleKind A cron expression read in `timezone`, or a fixed interval in minutes.
     * @param bool $enabled False while paused.
     * @param 'new'|'up'|'down' $status `new` until the first ping (a heartbeat never alerts before its job has reported once), `up` after a success, `down` after a missed deadline or a `/fail` ping.
     * @param 'missed'|'failed'|null $downReason
     * @param string $pingUrl The secret URL the job pings; append `/start` before a run and `/fail` on failure. Absolute when the server knows its public address, otherwise a path.
     * @param int|null $lastDurationMs The last run's duration, from its `/start` ping to the ping that closed it.
     * @param string|null $deadlineAt `nextExpectedAt` plus the grace period; null while new, paused or down.
     * @param string|null $resourceId The scheduled resource this heartbeat watches; advisory, not a foreign key.
     * @param PluginId::*|null $pluginId
     * @param string|null $fieldKey The resource field the schedule was read from.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $scheduleKind,
        public readonly ?string $cronExpression,
        public readonly string $timezone,
        public readonly ?int $intervalMinutes,
        public readonly int $graceMinutes,
        public readonly bool $enabled,
        public readonly string $status,
        public readonly ?string $downReason,
        public readonly string $pingUrl,
        public readonly ?string $lastPingAt,
        public readonly ?string $lastStartAt,
        public readonly ?string $lastFailAt,
        public readonly ?int $lastDurationMs,
        public readonly ?string $nextExpectedAt,
        public readonly ?string $deadlineAt,
        public readonly ?string $lastStateChangeAt,
        public readonly ?string $accountId,
        public readonly ?string $resourceId,
        public readonly ?string $pluginId,
        public readonly ?string $resourceTypeId,
        public readonly ?string $fieldKey,
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
            scheduleKind: Coerce::toString($data['scheduleKind'] ?? null),
            cronExpression: Coerce::toStringOrNull($data['cronExpression'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            intervalMinutes: Coerce::toIntOrNull($data['intervalMinutes'] ?? null),
            graceMinutes: Coerce::toInt($data['graceMinutes'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            downReason: Coerce::toStringOrNull($data['downReason'] ?? null),
            pingUrl: Coerce::toString($data['pingUrl'] ?? null),
            lastPingAt: Coerce::toStringOrNull($data['lastPingAt'] ?? null),
            lastStartAt: Coerce::toStringOrNull($data['lastStartAt'] ?? null),
            lastFailAt: Coerce::toStringOrNull($data['lastFailAt'] ?? null),
            lastDurationMs: Coerce::toIntOrNull($data['lastDurationMs'] ?? null),
            nextExpectedAt: Coerce::toStringOrNull($data['nextExpectedAt'] ?? null),
            deadlineAt: Coerce::toStringOrNull($data['deadlineAt'] ?? null),
            lastStateChangeAt: Coerce::toStringOrNull($data['lastStateChangeAt'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            fieldKey: Coerce::toStringOrNull($data['fieldKey'] ?? null),
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
            'scheduleKind' => $this->scheduleKind,
            'cronExpression' => $this->cronExpression,
            'timezone' => $this->timezone,
            'intervalMinutes' => $this->intervalMinutes,
            'graceMinutes' => $this->graceMinutes,
            'enabled' => $this->enabled,
            'status' => $this->status,
            'downReason' => $this->downReason,
            'pingUrl' => $this->pingUrl,
            'lastPingAt' => $this->lastPingAt,
            'lastStartAt' => $this->lastStartAt,
            'lastFailAt' => $this->lastFailAt,
            'lastDurationMs' => $this->lastDurationMs,
            'nextExpectedAt' => $this->nextExpectedAt,
            'deadlineAt' => $this->deadlineAt,
            'lastStateChangeAt' => $this->lastStateChangeAt,
            'accountId' => $this->accountId,
            'resourceId' => $this->resourceId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'fieldKey' => $this->fieldKey,
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
