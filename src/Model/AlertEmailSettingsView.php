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

final class AlertEmailSettingsView implements \JsonSerializable
{
    /**
     * @param 'member-domains'|'any' $externalPolicy `member-domains` (the default): an extra address must be on a domain one of the organization's members signs in with, or one listed in `allowedDomains`. `any`: no restriction.
     * @param list<string> $allowedDomains
     * @param list<string> $memberDomains
     * @param list<AlertEmailSuppression> $suppressions Addresses that used the unsubscribe link in an alert email. They receive no alert email from this organization until an admin removes the entry.
     */
    public function __construct(
        public readonly string $externalPolicy,
        public readonly array $allowedDomains,
        public readonly bool $emailAvailable,
        public readonly array $memberDomains,
        public readonly array $suppressions,
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
            externalPolicy: Coerce::toString($data['externalPolicy'] ?? null),
            allowedDomains: Coerce::mapList($data['allowedDomains'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            emailAvailable: Coerce::toBool($data['emailAvailable'] ?? null),
            memberDomains: Coerce::mapList($data['memberDomains'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            suppressions: Coerce::mapList($data['suppressions'] ?? null, static fn (mixed $item): AlertEmailSuppression => AlertEmailSuppression::fromArray(Coerce::toArray($item))),
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
            'externalPolicy' => $this->externalPolicy,
            'allowedDomains' => $this->allowedDomains,
            'emailAvailable' => $this->emailAvailable,
            'memberDomains' => $this->memberDomains,
            'suppressions' => array_map(static fn (AlertEmailSuppression $item): array => $item->toArray(), $this->suppressions),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
