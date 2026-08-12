<?php

/*
 * infrawrench/sdk v1.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.14.0).
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

final class WorkflowSchedule implements \JsonSerializable
{
    /**
     * @param string $expression Standard 5-field cron expression (minute hour day-of-month month day-of-week). Supports `*`, lists, ranges, and steps; 3-letter month/weekday names; `7` as Sunday. When both day fields are restricted, a date matches if either does (POSIX).
     * @param string|null $timezone IANA timezone the expression's wall times are evaluated in. Omit or null for UTC.
     * @param bool $enabled Mirrors the workflow's enabled flag — a disabled workflow's schedule never fires.
     * @param string|null $lastRunAt When the workflow last finished a run (any trigger source).
     * @param string|null $nextRunAt The persisted next fire time the scheduler will claim. Null while disabled, or when the expression never matches.
     * @param list<string> $nextRuns Preview of the next few fire times, computed at read time.
     */
    public function __construct(
        public readonly string $expression,
        public readonly ?string $timezone,
        public readonly bool $enabled,
        public readonly ?string $lastRunAt,
        public readonly ?string $nextRunAt,
        public readonly array $nextRuns,
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
            expression: Coerce::toString($data['expression'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            nextRunAt: Coerce::toStringOrNull($data['nextRunAt'] ?? null),
            nextRuns: Coerce::mapList($data['nextRuns'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'expression' => $this->expression,
            'timezone' => $this->timezone,
            'enabled' => $this->enabled,
            'lastRunAt' => $this->lastRunAt,
            'nextRunAt' => $this->nextRunAt,
            'nextRuns' => $this->nextRuns,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
