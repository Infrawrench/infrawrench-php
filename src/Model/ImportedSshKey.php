<?php

/*
 * infrawrench/sdk v0.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.26.0).
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

final class ImportedSshKey implements \JsonSerializable
{
    /** @param SshKeyType::* $keyType */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $keyType,
        public readonly string $fingerprint,
        public readonly string $publicKey,
        public readonly bool $isImported,
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
            name: Coerce::toString($data['name'] ?? null),
            keyType: Coerce::toString($data['keyType'] ?? null),
            fingerprint: Coerce::toString($data['fingerprint'] ?? null),
            publicKey: Coerce::toString($data['publicKey'] ?? null),
            isImported: Coerce::toBool($data['isImported'] ?? null),
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
            'id' => $this->id,
            'name' => $this->name,
            'keyType' => $this->keyType,
            'fingerprint' => $this->fingerprint,
            'publicKey' => $this->publicKey,
            'isImported' => $this->isImported,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
