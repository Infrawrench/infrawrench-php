<?php

/*
 * infrawrench/sdk v1.103.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.103.0).
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

final class UpdateAccountRequest implements \JsonSerializable
{
    /**
     * @param string|null $bastionId Pass `null` to unbind, a uuid to bind, or omit the field to leave the binding unchanged.
     * @param list<ProductId::*>|null $products Change the apps this connection is for; omit the field to leave them unchanged. Same rules as on create. Adding an app makes its collection due now; the credential must already carry that app's permissions.
     */
    public function __construct(
        public readonly ?string $displayName = null,
        public readonly ?string $bastionId = null,
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
            displayName: Coerce::toStringOrNull($data['displayName'] ?? null),
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
        ];
        if ($this->displayName !== null) {
            $payload['displayName'] = $this->displayName;
        }
        if ($this->bastionId !== null) {
            $payload['bastionId'] = $this->bastionId;
        }
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
