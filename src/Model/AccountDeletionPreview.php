<?php

/*
 * infrawrench/sdk v1.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.3.0).
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

final class AccountDeletionPreview implements \JsonSerializable
{
    /**
     * @param list<OrganizationRef> $organizationsToDelete Deleted with the account — the caller is their only member.
     * @param list<OrganizationRef> $organizationsToLeave Survive; the caller's membership is removed.
     * @param list<OwnershipBlocker> $blockers Non-empty means DELETE /api/profile will refuse until another owner is promoted.
     */
    public function __construct(
        public readonly array $organizationsToDelete,
        public readonly array $organizationsToLeave,
        public readonly array $blockers,
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
            organizationsToDelete: Coerce::mapList($data['organizationsToDelete'] ?? null, static fn (mixed $item): OrganizationRef => OrganizationRef::fromArray(Coerce::toArray($item))),
            organizationsToLeave: Coerce::mapList($data['organizationsToLeave'] ?? null, static fn (mixed $item): OrganizationRef => OrganizationRef::fromArray(Coerce::toArray($item))),
            blockers: Coerce::mapList($data['blockers'] ?? null, static fn (mixed $item): OwnershipBlocker => OwnershipBlocker::fromArray(Coerce::toArray($item))),
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
            'organizationsToDelete' => array_map(static fn (OrganizationRef $item): array => $item->toArray(), $this->organizationsToDelete),
            'organizationsToLeave' => array_map(static fn (OrganizationRef $item): array => $item->toArray(), $this->organizationsToLeave),
            'blockers' => array_map(static fn (OwnershipBlocker $item): array => $item->toArray(), $this->blockers),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
