<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class PlatformAgent implements \JsonSerializable
{
    /**
     * @param list<string> $scopes
     * @param list<string> $providers Empty means every provider.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $externalId,
        public readonly string $label,
        public readonly array $scopes,
        public readonly array $providers,
        public readonly ?string $credentialPrefix,
        public readonly ?string $lastSeenAt,
        public readonly ?string $revokedAt,
        public readonly string $createdAt,
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
            externalId: Coerce::toString($data['externalId'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            scopes: Coerce::mapList($data['scopes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            credentialPrefix: Coerce::toStringOrNull($data['credentialPrefix'] ?? null),
            lastSeenAt: Coerce::toStringOrNull($data['lastSeenAt'] ?? null),
            revokedAt: Coerce::toStringOrNull($data['revokedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'externalId' => $this->externalId,
            'label' => $this->label,
            'scopes' => $this->scopes,
            'providers' => $this->providers,
            'credentialPrefix' => $this->credentialPrefix,
            'lastSeenAt' => $this->lastSeenAt,
            'revokedAt' => $this->revokedAt,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
