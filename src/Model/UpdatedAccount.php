<?php

/*
 * infrawrench/sdk v1.105.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.105.0).
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

final class UpdatedAccount implements \JsonSerializable
{
    /**
     * @param list<string>|null $products The apps this connection is for, as product ids (`infrastructure`, `costs`, `observability`, `incidents`, `security`, `delivery`, `automation`). `null` means every app the plugin offers. Collection follows it: an account connected for `costs` alone is not resource-synced, and one without `costs` has no cost data collected.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $displayName,
        public readonly ?string $bastionId,
        public readonly ?array $products = null,
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
            displayName: Coerce::toString($data['displayName'] ?? null),
            bastionId: Coerce::toStringOrNull($data['bastionId'] ?? null),
            products: Coerce::nullable($data['products'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'displayName' => $this->displayName,
            'bastionId' => $this->bastionId,
        ];
        if ($this->products !== null) {
            $payload['products'] = $this->products;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
