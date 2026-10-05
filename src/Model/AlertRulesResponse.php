<?php

/*
 * infrawrench/sdk v1.74.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.0).
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

final class AlertRulesResponse implements \JsonSerializable
{
    /**
     * @param list<AlertRule> $rules
     * @param bool $usingDefaults True when the organization has saved no rules and `rules` is the synthesized default — everything except drift, to every connected channel and to mobile push.
     * @param list<array{id: string, name: string, isPrivate: bool}> $slackChannels
     * @param list<array{id: string, label: string}> $msTeamsWebhooks
     * @param list<array{id: string, displayName: string, pluginId: string}> $accounts
     * @param list<array{id: string, name: string}> $onCallSchedules Live on-call rotations, so the editor can offer 'whoever is on call' as a destination. Disabled rotations are omitted for the same reason a disconnected Slack install is: offering one would let the editor build a rule that routes nowhere.
     * @param list<array{userId: string, name: string|null, email: string}> $members Current members, for the email destination picker.
     * @param bool $emailAvailable Whether this deployment has a mail provider configured.
     * @param array{externalPolicy: 'member-domains'|'any', allowedDomains: list<string>} $emailSettings The external-address policy an `email-address` destination must pass.
     * @param list<string> $memberDomains Domains the organization's members sign in with: the implicit allowlist.
     */
    public function __construct(
        public readonly array $rules,
        public readonly bool $usingDefaults,
        public readonly array $slackChannels,
        public readonly array $msTeamsWebhooks,
        public readonly array $accounts,
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
            rules: Coerce::mapList($data['rules'] ?? null, static fn (mixed $item): AlertRule => AlertRule::fromArray(Coerce::toArray($item))),
            usingDefaults: Coerce::toBool($data['usingDefaults'] ?? null),
            slackChannels: Coerce::mapList($data['slackChannels'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            msTeamsWebhooks: Coerce::mapList($data['msTeamsWebhooks'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'rules' => array_map(static fn (AlertRule $item): array => $item->toArray(), $this->rules),
            'usingDefaults' => $this->usingDefaults,
            'slackChannels' => $this->slackChannels,
            'msTeamsWebhooks' => $this->msTeamsWebhooks,
            'accounts' => $this->accounts,
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
