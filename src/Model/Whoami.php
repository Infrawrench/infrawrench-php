<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class Whoami implements \JsonSerializable
{
    /**
     * @param string $userId The user the credential acts as. For an agent this is the agent's own user, not the person who claimed it.
     * @param string $organizationId The organization the credential is pinned to.
     * @param 'user'|'api_key'|'agent' $principal `user` for a person's WorkOS access token, `api_key` for an `iwk_` key, `agent` for an agent credential or agent token.
     */
    public function __construct(
        public readonly string $userId,
        public readonly string $organizationId,
        public readonly string $principal,
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
            userId: Coerce::toString($data['userId'] ?? null),
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            principal: Coerce::toString($data['principal'] ?? null),
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
            'userId' => $this->userId,
            'organizationId' => $this->organizationId,
            'principal' => $this->principal,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
