<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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

final class PreflightCapability implements \JsonSerializable
{
    /** @param list<PreflightPermission> $requiredPermissions */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly array $requiredPermissions,
        public readonly ?string $description = null,
        public readonly ?bool $essential = null,
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
            label: Coerce::toString($data['label'] ?? null),
            requiredPermissions: Coerce::mapList($data['requiredPermissions'] ?? null, static fn (mixed $item): PreflightPermission => PreflightPermission::fromArray(Coerce::toArray($item))),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            essential: Coerce::toBoolOrNull($data['essential'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'id' => $this->id,
            'label' => $this->label,
            'requiredPermissions' => array_map(static fn (PreflightPermission $item): array => $item->toArray(), $this->requiredPermissions),
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->essential !== null) {
            $payload['essential'] = $this->essential;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
