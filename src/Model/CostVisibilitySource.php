<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class CostVisibilitySource implements \JsonSerializable
{
    /**
     * @param CostVisibilityPrincipalKind::* $kind
     * @param list<string> $costCentreIds
     * @param list<string> $accountIds
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?string $label,
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
            kind: Coerce::toString($data['kind'] ?? null),
            label: Coerce::toStringOrNull($data['label'] ?? null),
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
            'kind' => $this->kind,
            'label' => $this->label,
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
