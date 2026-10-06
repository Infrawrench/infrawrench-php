<?php

/*
 * infrawrench/sdk v1.75.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.75.0).
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

final class AlertEmailOptions implements \JsonSerializable
{
    /**
     * @param bool $emailAvailable Whether this deployment has a mail provider configured. False means alert email is never sent.
     * @param list<AlertEmailMember> $members
     * @param list<string> $memberDomains Domains the organization's members sign in with: the implicit allowlist.
     */
    public function __construct(
        public readonly bool $emailAvailable,
        public readonly array $members,
        public readonly AlertEmailSettings $settings,
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
            emailAvailable: Coerce::toBool($data['emailAvailable'] ?? null),
            members: Coerce::mapList($data['members'] ?? null, static fn (mixed $item): AlertEmailMember => AlertEmailMember::fromArray(Coerce::toArray($item))),
            settings: AlertEmailSettings::fromArray(Coerce::toArray($data['settings'] ?? null)),
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
            'emailAvailable' => $this->emailAvailable,
            'members' => array_map(static fn (AlertEmailMember $item): array => $item->toArray(), $this->members),
            'settings' => $this->settings->toArray(),
            'memberDomains' => $this->memberDomains,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
