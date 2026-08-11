<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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
     */
    public function __construct(
        public readonly array $rules,
        public readonly bool $usingDefaults,
        public readonly array $slackChannels,
        public readonly array $msTeamsWebhooks,
        public readonly array $accounts,
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
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
