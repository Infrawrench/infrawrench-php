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

final class AgentRegistration implements \JsonSerializable
{
    /**
     * @param 'anonymous'|'service_auth'|'platform' $kind
     * @param string|null $prefix First 8 characters of the credential.
     * @param string|null $linkId The platform link that made this agent (`kind: platform`), else null.
     * @param string|null $externalId The platform's own id for it.
     * @param list<string>|null $scopes Platform agents only: the scopes granted, before provider narrowing.
     * @param list<string>|null $providers Platform agents only: plugin ids its scopes are narrowed to. Empty means all.
     */
    public function __construct(
        public readonly string $id,
        public readonly ?string $label,
        public readonly string $kind,
        public readonly ?string $prefix,
        public readonly ?string $claimedAt,
        public readonly ?string $claimedByUserId,
        public readonly ?string $claimedByEmail,
        public readonly ?string $lastSeenAt,
        public readonly ?string $revokedAt,
        public readonly string $createdAt,
        public readonly ?string $linkId,
        public readonly ?string $externalId,
        public readonly ?array $scopes,
        public readonly ?array $providers,
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
            label: Coerce::toStringOrNull($data['label'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            prefix: Coerce::toStringOrNull($data['prefix'] ?? null),
            claimedAt: Coerce::toStringOrNull($data['claimedAt'] ?? null),
            claimedByUserId: Coerce::toStringOrNull($data['claimedByUserId'] ?? null),
            claimedByEmail: Coerce::toStringOrNull($data['claimedByEmail'] ?? null),
            lastSeenAt: Coerce::toStringOrNull($data['lastSeenAt'] ?? null),
            revokedAt: Coerce::toStringOrNull($data['revokedAt'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            linkId: Coerce::toStringOrNull($data['linkId'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            scopes: Coerce::nullable($data['scopes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            providers: Coerce::nullable($data['providers'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'label' => $this->label,
            'kind' => $this->kind,
            'prefix' => $this->prefix,
            'claimedAt' => $this->claimedAt,
            'claimedByUserId' => $this->claimedByUserId,
            'claimedByEmail' => $this->claimedByEmail,
            'lastSeenAt' => $this->lastSeenAt,
            'revokedAt' => $this->revokedAt,
            'createdAt' => $this->createdAt,
            'linkId' => $this->linkId,
            'externalId' => $this->externalId,
            'scopes' => $this->scopes,
            'providers' => $this->providers,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
