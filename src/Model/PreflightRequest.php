<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class PreflightRequest implements \JsonSerializable
{
    /**
     * @param array<string, string> $credentials
     * @param string|null $bastionId Probe through this bastion, matching how the account will egress once created.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly array $credentials,
        public readonly ?string $bastionId = null,
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
            credentials: Coerce::mapValues($data['credentials'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            bastionId: Coerce::toStringOrNull($data['bastionId'] ?? null),
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
            'credentials' => $this->credentials,
        ];
        if ($this->bastionId !== null) {
            $payload['bastionId'] = $this->bastionId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
