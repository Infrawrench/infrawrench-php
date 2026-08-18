<?php

/*
 * infrawrench/sdk v1.30.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.30.0).
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

final class ReportNotification implements \JsonSerializable
{
    /**
     * @param 'daily'|'weekly'|'monthly' $cadence How often the schedule fires. The report itself decides what window it charts.
     * @param list<string> $slackChannelIds
     * @param list<string> $teamsWebhookIds
     * @param list<string> $emailRecipients
     * @param string|null $nextSendAt When the next scheduled send is due; null while disabled.
     * @param string|null $lastSentAt When a delivery last actually reached at least one destination.
     * @param 'pending'|'succeeded'|'partial'|'failed'|'no_targets'|null $lastStatus What the last attempt did. `partial` means some destinations took it and some failed — never retried automatically, because a retry would double-post where it landed.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $costReportId,
        public readonly string $cadence,
        public readonly int $sendDay,
        public readonly int $sendDayOfMonth,
        public readonly int $hour,
        public readonly string $timezone,
        public readonly array $slackChannelIds,
        public readonly array $teamsWebhookIds,
        public readonly array $emailRecipients,
        public readonly bool $enabled,
        public readonly ?string $nextSendAt,
        public readonly ?string $lastSentAt,
        public readonly ?string $lastStatus,
        public readonly ?string $lastError,
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
            costReportId: Coerce::toString($data['costReportId'] ?? null),
            cadence: Coerce::toString($data['cadence'] ?? null),
            sendDay: Coerce::toInt($data['sendDay'] ?? null),
            sendDayOfMonth: Coerce::toInt($data['sendDayOfMonth'] ?? null),
            hour: Coerce::toInt($data['hour'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            slackChannelIds: Coerce::mapList($data['slackChannelIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            teamsWebhookIds: Coerce::mapList($data['teamsWebhookIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            emailRecipients: Coerce::mapList($data['emailRecipients'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            nextSendAt: Coerce::toStringOrNull($data['nextSendAt'] ?? null),
            lastSentAt: Coerce::toStringOrNull($data['lastSentAt'] ?? null),
            lastStatus: Coerce::toStringOrNull($data['lastStatus'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
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
            'costReportId' => $this->costReportId,
            'cadence' => $this->cadence,
            'sendDay' => $this->sendDay,
            'sendDayOfMonth' => $this->sendDayOfMonth,
            'hour' => $this->hour,
            'timezone' => $this->timezone,
            'slackChannelIds' => $this->slackChannelIds,
            'teamsWebhookIds' => $this->teamsWebhookIds,
            'emailRecipients' => $this->emailRecipients,
            'enabled' => $this->enabled,
            'nextSendAt' => $this->nextSendAt,
            'lastSentAt' => $this->lastSentAt,
            'lastStatus' => $this->lastStatus,
            'lastError' => $this->lastError,
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
