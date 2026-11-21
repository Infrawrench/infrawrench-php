<?php

/*
 * infrawrench/sdk v1.124.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.124.0).
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

final class HeartbeatSuggestion implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param string $fieldKey The field the plugin flags as the resource's schedule.
     * @param string $rawSchedule The value as the provider reported it.
     * @param array{kind: 'cron', cronExpression: string, timezone: string}|array{kind: 'interval', intervalMinutes: int}|null $schedule The value read as a heartbeat schedule; null when its dialect is not readable.
     * @param list<string> $watchedBy Heartbeats already watching this resource.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $accountId,
        public readonly string $fieldKey,
        public readonly string $rawSchedule,
        public readonly ?array $schedule,
        public readonly array $watchedBy,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            fieldKey: Coerce::toString($data['fieldKey'] ?? null),
            rawSchedule: Coerce::toString($data['rawSchedule'] ?? null),
            schedule: $data['schedule'] ?? null,
            watchedBy: Coerce::mapList($data['watchedBy'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'resourceId' => $this->resourceId,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'accountId' => $this->accountId,
            'fieldKey' => $this->fieldKey,
            'rawSchedule' => $this->rawSchedule,
            'schedule' => $this->schedule,
            'watchedBy' => $this->watchedBy,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
