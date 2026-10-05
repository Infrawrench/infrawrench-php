<?php

/*
 * infrawrench/sdk v1.49.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.49.0).
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

final class CostVisibilityScopeInput implements \JsonSerializable
{
    /**
     * @param CostVisibilityPrincipalKind::* $principalKind
     * @param list<string> $costCentreIds Rows the allocation rules assign to these cost centres (or their children).
     * @param list<string> $accountIds Rows on these connected accounts.
     * @param string|null $savedFilterId A saved filter ANDed onto the scope. With no centres and no accounts it decides alone; a scope with nothing at all matches no rows.
     */
    public function __construct(
        public readonly string $principalKind,
        public readonly string $principalId,
        public readonly array $costCentreIds,
        public readonly array $accountIds,
        public readonly ?string $savedFilterId,
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
            principalKind: Coerce::toString($data['principalKind'] ?? null),
            principalId: Coerce::toString($data['principalId'] ?? null),
            costCentreIds: Coerce::mapList($data['costCentreIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            accountIds: Coerce::mapList($data['accountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
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
            'principalKind' => $this->principalKind,
            'principalId' => $this->principalId,
            'costCentreIds' => $this->costCentreIds,
            'accountIds' => $this->accountIds,
            'savedFilterId' => $this->savedFilterId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
