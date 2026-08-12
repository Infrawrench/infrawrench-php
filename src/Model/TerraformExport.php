<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class TerraformExport implements \JsonSerializable
{
    /**
     * @param list<array{id: string, displayName: string, pluginId: string, resourceTypeId: string, address: string, importId?: string}> $exported
     * @param list<array{id: string, displayName: string, pluginId: string, resourceTypeId: string, reason: string}> $unsupported
     */
    public function __construct(
        public readonly string $hcl,
        public readonly array $exported,
        public readonly array $unsupported,
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
            hcl: Coerce::toString($data['hcl'] ?? null),
            exported: Coerce::mapList($data['exported'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            unsupported: Coerce::mapList($data['unsupported'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'hcl' => $this->hcl,
            'exported' => $this->exported,
            'unsupported' => $this->unsupported,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
