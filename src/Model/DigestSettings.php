<?php

/*
 * infrawrench/sdk v0.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.38.0).
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

final class DigestSettings implements \JsonSerializable
{
    /**
     * @param bool $enabled Whether the weekly digest is enabled for this organization. Delivery targets are the Slack channels and Teams webhooks whose weeklyDigest trigger is on, plus the organization's digest email recipients.
     * @param string|null $lastSentWeekStart Monday (ISO date, in the organization's timezone) of the last week a digest covered, or null when none has been sent.
     * @param string|null $lastSentAt When a digest last actually reached a destination, or null if none ever has.
     * @param string $timezone IANA time zone the schedule and the Monday-to-Sunday week boundary are expressed in. Defaults to UTC.
     * @param int $sendDay ISO day of week the digest is sent on: 1 = Monday … 7 = Sunday.
     * @param int $sendHour Local hour (0–23) in `timezone` the digest is sent at.
     * @param bool $narrativeEnabled Whether an AI-written summary paragraph is placed above the deterministic content. Opt-in, default off. Failures are non-fatal: the digest still sends without the paragraph.
     * @param bool $narrativeAvailable Whether this deployment has an LLM API key configured. False means enabling the narrative has no effect.
     * @param bool $emailAvailable Whether this deployment has a mail provider configured. False means email recipients are never delivered to.
     * @param int $attemptCount Delivery attempts made for lastSentWeekStart's window, including the first.
     * @param 'pending'|'succeeded'|'partial'|'failed'|'no_targets'|null $lastStatus Outcome of the most recent delivery attempt. `partial` (some destinations took it, some failed) is deliberately never retried automatically — a retry would post the digest twice where it already landed. `failed` (nothing landed) is retried a bounded number of times with backoff, then parked until the next week.
     * @param string|null $lastError Why the last attempt was not a clean success, for display in the settings UI.
     * @param string|null $nextAttemptAt When the next automatic retry is due, or null when none is scheduled.
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly ?string $lastSentWeekStart,
        public readonly ?string $lastSentAt,
        public readonly string $timezone,
        public readonly int $sendDay,
        public readonly int $sendHour,
        public readonly bool $narrativeEnabled,
        public readonly bool $narrativeAvailable,
        public readonly bool $emailAvailable,
        public readonly int $attemptCount,
        public readonly ?string $lastAttemptAt,
        public readonly ?string $lastStatus,
        public readonly ?string $lastError,
        public readonly ?string $nextAttemptAt,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lastSentWeekStart: Coerce::toStringOrNull($data['lastSentWeekStart'] ?? null),
            lastSentAt: Coerce::toStringOrNull($data['lastSentAt'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            sendDay: Coerce::toInt($data['sendDay'] ?? null),
            sendHour: Coerce::toInt($data['sendHour'] ?? null),
            narrativeEnabled: Coerce::toBool($data['narrativeEnabled'] ?? null),
            narrativeAvailable: Coerce::toBool($data['narrativeAvailable'] ?? null),
            emailAvailable: Coerce::toBool($data['emailAvailable'] ?? null),
            attemptCount: Coerce::toInt($data['attemptCount'] ?? null),
            lastAttemptAt: Coerce::toStringOrNull($data['lastAttemptAt'] ?? null),
            lastStatus: Coerce::toStringOrNull($data['lastStatus'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            nextAttemptAt: Coerce::toStringOrNull($data['nextAttemptAt'] ?? null),
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
            'enabled' => $this->enabled,
            'lastSentWeekStart' => $this->lastSentWeekStart,
            'lastSentAt' => $this->lastSentAt,
            'timezone' => $this->timezone,
            'sendDay' => $this->sendDay,
            'sendHour' => $this->sendHour,
            'narrativeEnabled' => $this->narrativeEnabled,
            'narrativeAvailable' => $this->narrativeAvailable,
            'emailAvailable' => $this->emailAvailable,
            'attemptCount' => $this->attemptCount,
            'lastAttemptAt' => $this->lastAttemptAt,
            'lastStatus' => $this->lastStatus,
            'lastError' => $this->lastError,
            'nextAttemptAt' => $this->nextAttemptAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
