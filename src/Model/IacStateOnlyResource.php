<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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

final class IacStateOnlyResource implements \JsonSerializable
{
    /**
     * @param list<string> $identifiers
     * @param list<array{pluginId: PluginId::*, resourceTypeId: string}> $candidates
     * @param 'no-inventory-match'|'unknown-terraform-type' $reason
     */
    public function __construct(
        public readonly string $address,
        public readonly string $terraformType,
        public readonly array $identifiers,
        public readonly array $candidates,
        public readonly string $reason,
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
            address: Coerce::toString($data['address'] ?? null),
            terraformType: Coerce::toString($data['terraformType'] ?? null),
            identifiers: Coerce::mapList($data['identifiers'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            candidates: Coerce::mapList($data['candidates'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            reason: Coerce::toString($data['reason'] ?? null),
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
            'address' => $this->address,
            'terraformType' => $this->terraformType,
            'identifiers' => $this->identifiers,
            'candidates' => $this->candidates,
            'reason' => $this->reason,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
