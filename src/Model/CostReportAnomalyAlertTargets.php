<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class CostReportAnomalyAlertTargets implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string, isPrivate: bool}> $slackChannels
     * @param list<array{id: string, label: string}> $msTeamsWebhooks
     * @param list<array{id: string, name: string}> $onCallSchedules Live on-call rotations, so the editor can offer 'whoever is on call' as a destination. Disabled rotations are omitted for the same reason a disconnected Slack install is: offering one would let the editor build a rule that routes nowhere.
     * @param list<array{userId: string, name: string|null, email: string}> $members Current members, for the email destination picker.
     * @param bool $emailAvailable Whether this deployment has a mail provider configured.
     * @param array{externalPolicy: 'member-domains'|'any', allowedDomains: list<string>} $emailSettings The external-address policy an `email-address` destination must pass.
     * @param list<string> $memberDomains Domains the organization's members sign in with: the implicit allowlist.
     */
    public function __construct(
        public readonly array $slackChannels,
        public readonly array $msTeamsWebhooks,
        public readonly array $onCallSchedules,
        public readonly array $members,
        public readonly bool $emailAvailable,
        public readonly array $emailSettings,
        public readonly array $memberDomains,
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
            slackChannels: Coerce::mapList($data['slackChannels'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            msTeamsWebhooks: Coerce::mapList($data['msTeamsWebhooks'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            onCallSchedules: Coerce::mapList($data['onCallSchedules'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            members: Coerce::mapList($data['members'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            emailAvailable: Coerce::toBool($data['emailAvailable'] ?? null),
            emailSettings: Coerce::toArray($data['emailSettings'] ?? null),
            memberDomains: Coerce::mapList($data['memberDomains'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'slackChannels' => $this->slackChannels,
            'msTeamsWebhooks' => $this->msTeamsWebhooks,
            'onCallSchedules' => $this->onCallSchedules,
            'members' => $this->members,
            'emailAvailable' => $this->emailAvailable,
            'emailSettings' => $this->emailSettings,
            'memberDomains' => $this->memberDomains,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
