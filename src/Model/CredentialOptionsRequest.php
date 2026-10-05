<?php

/*
 * infrawrench/sdk v1.56.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.56.0).
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

final class CredentialOptionsRequest implements \JsonSerializable
{
    /**
     * @param string $fieldKey A credential field that declares `providerOptions`.
     * @param array<string, string> $credentials The credential values entered so far. Used for the lookup only; nothing is stored.
     * @param string|null $bastionId Look up through this bastion, matching how the account will egress once created.
     * @param string|null $accountId When editing an existing account, its id; the lookup then egresses through that account's bastion binding.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $fieldKey,
        public readonly array $credentials,
        public readonly ?string $bastionId = null,
        public readonly ?string $accountId = null,
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
            fieldKey: Coerce::toString($data['fieldKey'] ?? null),
            credentials: Coerce::mapValues($data['credentials'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            bastionId: Coerce::toStringOrNull($data['bastionId'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
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
            'fieldKey' => $this->fieldKey,
            'credentials' => $this->credentials,
        ];
        if ($this->bastionId !== null) {
            $payload['bastionId'] = $this->bastionId;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
