<?php

/*
 * infrawrench/sdk v1.52.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.52.0).
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

final class CostVisibilityScope implements \JsonSerializable
{
    /**
     * @param CostVisibilityPrincipalKind::* $principalKind
     * @param string $principalId Role id, member user id, or API key id.
     * @param string|null $principalLabel Role name, member email or key name; null when the principal no longer exists.
     * @param list<string> $costCentreIds
     * @param list<string> $accountIds
     */
    public function __construct(
        public readonly string $id,
        public readonly string $principalKind,
        public readonly string $principalId,
        public readonly ?string $principalLabel,
        public readonly array $costCentreIds,
        public readonly array $accountIds,
        public readonly ?string $savedFilterId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            principalKind: Coerce::toString($data['principalKind'] ?? null),
            principalId: Coerce::toString($data['principalId'] ?? null),
            principalLabel: Coerce::toStringOrNull($data['principalLabel'] ?? null),
            costCentreIds: Coerce::mapList($data['costCentreIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            accountIds: Coerce::mapList($data['accountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            savedFilterId: Coerce::toStringOrNull($data['savedFilterId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'id' => $this->id,
            'principalKind' => $this->principalKind,
            'principalId' => $this->principalId,
            'principalLabel' => $this->principalLabel,
            'costCentreIds' => $this->costCentreIds,
            'accountIds' => $this->accountIds,
            'savedFilterId' => $this->savedFilterId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
