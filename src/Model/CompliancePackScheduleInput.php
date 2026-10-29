<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class CompliancePackScheduleInput implements \JsonSerializable
{
    /**
     * @param string $frameworkId Framework registry id: `soc2` or `iso27001`.
     * @param 'monthly'|'quarterly' $cadence `monthly` delivers the previous calendar month on `sendDayOfMonth`; `quarterly` delivers the previous calendar quarter in January, April, July and October.
     * @param list<string> $emailRecipients
     * @param list<string>|null $slackChannelIds
     * @param list<string>|null $teamsWebhookIds
     */
    public function __construct(
        public readonly string $frameworkId,
        public readonly string $cadence,
        public readonly int $hour,
        public readonly string $timezone,
        public readonly array $emailRecipients,
        public readonly bool $enabled,
        public readonly ?int $sendDayOfMonth = null,
        public readonly ?array $slackChannelIds = null,
        public readonly ?array $teamsWebhookIds = null,
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
            frameworkId: Coerce::toString($data['frameworkId'] ?? null),
            cadence: Coerce::toString($data['cadence'] ?? null),
            hour: Coerce::toInt($data['hour'] ?? null),
            timezone: Coerce::toString($data['timezone'] ?? null),
            emailRecipients: Coerce::mapList($data['emailRecipients'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            sendDayOfMonth: Coerce::toIntOrNull($data['sendDayOfMonth'] ?? null),
            slackChannelIds: Coerce::nullable($data['slackChannelIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            teamsWebhookIds: Coerce::nullable($data['teamsWebhookIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'frameworkId' => $this->frameworkId,
            'cadence' => $this->cadence,
            'hour' => $this->hour,
            'timezone' => $this->timezone,
            'emailRecipients' => $this->emailRecipients,
            'enabled' => $this->enabled,
        ];
        if ($this->sendDayOfMonth !== null) {
            $payload['sendDayOfMonth'] = $this->sendDayOfMonth;
        }
        if ($this->slackChannelIds !== null) {
            $payload['slackChannelIds'] = $this->slackChannelIds;
        }
        if ($this->teamsWebhookIds !== null) {
            $payload['teamsWebhookIds'] = $this->teamsWebhookIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
