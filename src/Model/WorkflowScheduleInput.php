<?php

/*
 * infrawrench/sdk v1.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.22.0).
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

final class WorkflowScheduleInput implements \JsonSerializable
{
    /**
     * @param string $expression Standard 5-field cron expression (minute hour day-of-month month day-of-week). Supports `*`, lists, ranges, and steps; 3-letter month/weekday names; `7` as Sunday. When both day fields are restricted, a date matches if either does (POSIX).
     * @param string|null $timezone IANA timezone the expression's wall times are evaluated in. Omit or null for UTC.
     * @param bool|null $enabled Also set the workflow's enabled flag. Omit to leave it unchanged.
     */
    public function __construct(
        public readonly string $expression,
        public readonly ?string $timezone = null,
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
            expression: Coerce::toString($data['expression'] ?? null),
            timezone: Coerce::toStringOrNull($data['timezone'] ?? null),
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
            'expression' => $this->expression,
        ];
        if ($this->timezone !== null) {
            $payload['timezone'] = $this->timezone;
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
