<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PagingProviderSettingsInput implements \JsonSerializable
{
    /**
     * @param string|null $webhookSecret For a `manual` webhook only: the signing secret copied from the provider. `null` forgets it; omit to keep the stored one. Never returned.
     */
    public function __construct(
        public readonly bool $inboundEnabled,
        public readonly ?string $webhookSecret = null,
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
            inboundEnabled: Coerce::toBool($data['inboundEnabled'] ?? null),
            webhookSecret: Coerce::toStringOrNull($data['webhookSecret'] ?? null),
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
            'inboundEnabled' => $this->inboundEnabled,
        ];
        if ($this->webhookSecret !== null) {
            $payload['webhookSecret'] = $this->webhookSecret;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
