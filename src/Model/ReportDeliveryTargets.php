<?php

/*
 * infrawrench/sdk v1.7.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.7.0).
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

final class ReportDeliveryTargets implements \JsonSerializable
{
    /**
     * @param list<ReportDeliveryTargetOption> $slackChannels
     * @param list<ReportDeliveryTargetOption> $teamsWebhooks
     * @param bool $emailAvailable Whether this deployment can send mail at all. Addresses can be saved regardless, but they deliver nowhere until a mail provider is configured.
     */
    public function __construct(
        public readonly array $slackChannels,
        public readonly array $teamsWebhooks,
        public readonly bool $emailAvailable,
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
            slackChannels: Coerce::mapList($data['slackChannels'] ?? null, static fn (mixed $item): ReportDeliveryTargetOption => ReportDeliveryTargetOption::fromArray(Coerce::toArray($item))),
            teamsWebhooks: Coerce::mapList($data['teamsWebhooks'] ?? null, static fn (mixed $item): ReportDeliveryTargetOption => ReportDeliveryTargetOption::fromArray(Coerce::toArray($item))),
            emailAvailable: Coerce::toBool($data['emailAvailable'] ?? null),
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
            'slackChannels' => array_map(static fn (ReportDeliveryTargetOption $item): array => $item->toArray(), $this->slackChannels),
            'teamsWebhooks' => array_map(static fn (ReportDeliveryTargetOption $item): array => $item->toArray(), $this->teamsWebhooks),
            'emailAvailable' => $this->emailAvailable,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
