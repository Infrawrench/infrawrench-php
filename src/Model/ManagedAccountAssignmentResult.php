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

final class ManagedAccountAssignmentResult implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string, before: array{costCentreIds: list<string>, accountIds: list<string>}, after: array{costCentreIds: list<string>, accountIds: list<string>}}> $changes
     * @param list<ManagedAccount> $accounts
     */
    public function __construct(
        public readonly array $changes,
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
            changes: Coerce::mapList($data['changes'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): ManagedAccount => ManagedAccount::fromArray(Coerce::toArray($item))),
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
            'changes' => $this->changes,
            'accounts' => array_map(static fn (ManagedAccount $item): array => $item->toArray(), $this->accounts),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
