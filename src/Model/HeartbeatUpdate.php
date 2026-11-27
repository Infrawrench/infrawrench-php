<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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

final class HeartbeatUpdate implements \JsonSerializable
{
    /**
     * @param string|null $name Up to 120 characters.
     * @param 'cron'|'interval'|null $scheduleKind A cron expression read in `timezone`, or a fixed interval in minutes.
     * @param string|null $cronExpression Five-field cron (minute hour day-of-month month day-of-week).
     * @param string|null $timezone IANA time zone the cron expression is read in. Defaults to UTC.
     * @param int|null $intervalMinutes Minutes between expected pings. Clamped server-side to 1-44640 (31 days).
     * @param int|null $graceMinutes How late a ping may be before the heartbeat goes down. Clamped server-side to 1-10080.
     * @param bool|null $enabled False pauses. Resuming returns the heartbeat to `new` until its next ping.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $scheduleKind = null,
        public readonly ?string $cronExpression = null,
        public readonly ?string $timezone = null,
        public readonly ?int $intervalMinutes = null,
        public readonly ?int $graceMinutes = null,
        public readonly ?bool $enabled = null,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            scheduleKind: Coerce::toStringOrNull($data['scheduleKind'] ?? null),
            cronExpression: Coerce::toStringOrNull($data['cronExpression'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
            intervalMinutes: Coerce::toIntOrNull($data['intervalMinutes'] ?? null),
            graceMinutes: Coerce::toIntOrNull($data['graceMinutes'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
        ];
        if ($this->name !== null) {
            $payload['name'] = $this->name;
        }
        if ($this->scheduleKind !== null) {
            $payload['scheduleKind'] = $this->scheduleKind;
        }
        if ($this->cronExpression !== null) {
            $payload['cronExpression'] = $this->cronExpression;
        }
        if ($this->timezone !== null) {
            $payload['timezone'] = $this->timezone;
        }
        if ($this->intervalMinutes !== null) {
            $payload['intervalMinutes'] = $this->intervalMinutes;
        }
        if ($this->graceMinutes !== null) {
            $payload['graceMinutes'] = $this->graceMinutes;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
