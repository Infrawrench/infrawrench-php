<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class CalendarEvent implements \JsonSerializable
{
    /**
     * @param string $id Stable across renders for the same underlying thing, because it becomes the iCalendar UID. Recurring sources (sleep windows, cron runs) key it by occurrence.
     * @param 'change-freeze'|'sleep-schedule'|'expiry'|'commitment-expiry'|'workflow-schedule'|'incident' $kind Which of the organization's own records the event was projected from. The kinds are sources rather than a severity taxonomy: a reader scanning a month wants to know that one bar is a freeze and another is a certificate.
     * @param string $startsAt Clamped to the requested window's lower bound when the underlying span began earlier; `openEnded` says so.
     * @param string|null $endsAt Null means a point in time — a deadline, a scheduled run — or a span whose end is not known. `openEnded` distinguishes the two.
     * @param bool $openEnded The span continues past an edge of the window, or has no declared end at all (a freeze held until further notice, an unresolved incident).
     * @param bool $allDay The event is meaningful only to the day — a deadline read off a date field. Rendering such a thing at the provider's stored midnight would be false precision.
     * @param 'critical'|'warning'|'info' $severity
     * @param array{target: 'resource', accountId: string, resourceId: string}|array{target: 'tab', tab: 'expiring'|'incidents'|'workflows'|'costs'|'settings'}|null $link
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $title,
        public readonly ?string $detail,
        public readonly string $startsAt,
        public readonly ?string $endsAt,
        public readonly bool $openEnded,
        public readonly bool $allDay,
        public readonly string $severity,
        public readonly ?array $link,
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
            kind: Coerce::toString($data['kind'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            startsAt: Coerce::toString($data['startsAt'] ?? null),
            endsAt: Coerce::toStringOrNull($data['endsAt'] ?? null),
            openEnded: Coerce::toBool($data['openEnded'] ?? null),
            allDay: Coerce::toBool($data['allDay'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            link: $data['link'] ?? null,
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
            'kind' => $this->kind,
            'title' => $this->title,
            'detail' => $this->detail,
            'startsAt' => $this->startsAt,
            'endsAt' => $this->endsAt,
            'openEnded' => $this->openEnded,
            'allDay' => $this->allDay,
            'severity' => $this->severity,
            'link' => $this->link,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
