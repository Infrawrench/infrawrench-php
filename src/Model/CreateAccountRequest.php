<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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

final class CreateAccountRequest implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param array<string, string> $credentials An `__oauth` key may only carry the sealed grant returned by the provider OAuth callback (for this organization, the calling user and this plugin, within 30 minutes) or the redacted grant `GET .../credentials` returned, which counts as no grant (the stored one is kept while the token is unchanged). Any other value is rejected with 400.
     * @param string|null $bastionId Optional bastion id to route this account's cloud API traffic through.
     * @param list<ProductId::*>|null $products The apps to use this connection for. Each must be one the plugin offers (the distinct `product`s of its `preflight.capabilities`, where a capability without one follows the convention for its id); an empty list is rejected, as is any list for a plugin without preflight. `null`, or the plugin's whole offer, means every app and is stored as `null`.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $displayName,
        public readonly array $credentials,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            credentials: Coerce::mapValues($data['credentials'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'pluginId' => $this->pluginId,
            'displayName' => $this->displayName,
            'credentials' => $this->credentials,
        ];
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
