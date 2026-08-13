<?php

/*
 * infrawrench/sdk v1.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.24.0).
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

/**
 * A full replace, like a report's own PUT. At least one destination is required — a schedule with
 * nowhere to deliver would only ever record failures.
 */
final class ReportNotificationInput implements \JsonSerializable
{
    /**
     * @param 'daily'|'weekly'|'monthly' $cadence How often the schedule fires. The report itself decides what window it charts.
     * @param int $hour Local hour in `timezone` the delivery fires at.
     * @param string $timezone IANA zone, e.g. `Europe/Berlin`. Validated server-side.
     * @param list<string> $slackChannelIds Stored Slack channel row ids (from the targets endpoint) to post to.
     * @param list<string> $teamsWebhookIds Stored Teams webhook row ids (from the targets endpoint) to post to.
     * @param list<string> $emailRecipients Email addresses; normalized (lowercased) server-side. At most 20.
     * @param int|null $sendDay ISO day of week (1 = Monday … 7 = Sunday); read only when cadence is weekly.
     * @param int|null $sendDayOfMonth Day of month; read only when cadence is monthly. A day the month doesn't have clamps to its last day, so 31 means month end everywhere.
     */
    public function __construct(
        public readonly string $cadence,
        public readonly int $hour,
        public readonly string $timezone,
        public readonly array $slackChannelIds,
        public readonly array $teamsWebhookIds,
        public readonly array $emailRecipients,
        public readonly bool $enabled,
        public readonly ?int $sendDay = null,
        public readonly ?int $sendDayOfMonth = null,
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
            cadence: Coerce::toString($data['cadence'] ?? null),
            hour: Coerce::toInt($data['hour'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            slackChannelIds: Coerce::mapList($data['slackChannelIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            teamsWebhookIds: Coerce::mapList($data['teamsWebhookIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            emailRecipients: Coerce::mapList($data['emailRecipients'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            sendDay: Coerce::toIntOrNull($data['sendDay'] ?? null),
            sendDayOfMonth: Coerce::toIntOrNull($data['sendDayOfMonth'] ?? null),
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
            'cadence' => $this->cadence,
            'hour' => $this->hour,
            'timezone' => $this->timezone,
            'slackChannelIds' => $this->slackChannelIds,
            'teamsWebhookIds' => $this->teamsWebhookIds,
            'emailRecipients' => $this->emailRecipients,
            'enabled' => $this->enabled,
        ];
        if ($this->sendDay !== null) {
            $payload['sendDay'] = $this->sendDay;
        }
        if ($this->sendDayOfMonth !== null) {
            $payload['sendDayOfMonth'] = $this->sendDayOfMonth;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
