<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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

final class AssociationRequest implements \JsonSerializable
{
    /**
     * @param string|null $providerPluginId Deprecated and ignored: read from the stored provider resource.
     * @param string|null $providerResourceTypeId Deprecated and ignored: read from the stored provider resource.
     * @param string|null $providerAccountId Deprecated and ignored: read from the stored provider resource.
     */
    public function __construct(
        public readonly string $consumerResourceId,
        public readonly string $consumerFieldKey,
        public readonly string $providerResourceId,
        public readonly string $providerOutputKey,
        public readonly ?string $providerPluginId = null,
        public readonly ?string $providerResourceTypeId = null,
        public readonly ?string $providerAccountId = null,
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
            consumerResourceId: Coerce::toString($data['consumerResourceId'] ?? null),
            consumerFieldKey: Coerce::toString($data['consumerFieldKey'] ?? null),
            providerResourceId: Coerce::toString($data['providerResourceId'] ?? null),
            providerOutputKey: Coerce::toString($data['providerOutputKey'] ?? null),
            providerPluginId: Coerce::toStringOrNull($data['providerPluginId'] ?? null),
            providerResourceTypeId: Coerce::toStringOrNull($data['providerResourceTypeId'] ?? null),
            providerAccountId: Coerce::toStringOrNull($data['providerAccountId'] ?? null),
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
            'consumerResourceId' => $this->consumerResourceId,
            'consumerFieldKey' => $this->consumerFieldKey,
            'providerResourceId' => $this->providerResourceId,
            'providerOutputKey' => $this->providerOutputKey,
        ];
        if ($this->providerPluginId !== null) {
            $payload['providerPluginId'] = $this->providerPluginId;
        }
        if ($this->providerResourceTypeId !== null) {
            $payload['providerResourceTypeId'] = $this->providerResourceTypeId;
        }
        if ($this->providerAccountId !== null) {
            $payload['providerAccountId'] = $this->providerAccountId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
