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

final class JitCreateRequest implements \JsonSerializable
{
    /**
     * @param string|null $principalId Only when the caller's email does not resolve; must be one the provider lists.
     */
    public function __construct(
        public readonly string $policyId,
        public readonly string $scopeId,
        public readonly string $roleId,
        public readonly int $durationMinutes,
        public readonly string $reason,
        public readonly ?string $ticket = null,
        public readonly ?string $principalId = null,
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
            policyId: Coerce::toString($data['policyId'] ?? null),
            scopeId: Coerce::toString($data['scopeId'] ?? null),
            roleId: Coerce::toString($data['roleId'] ?? null),
            durationMinutes: Coerce::toInt($data['durationMinutes'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            ticket: Coerce::toStringOrNull($data['ticket'] ?? null),
            principalId: Coerce::toStringOrNull($data['principalId'] ?? null),
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
            'policyId' => $this->policyId,
            'scopeId' => $this->scopeId,
            'roleId' => $this->roleId,
            'durationMinutes' => $this->durationMinutes,
            'reason' => $this->reason,
        ];
        if ($this->ticket !== null) {
            $payload['ticket'] = $this->ticket;
        }
        if ($this->principalId !== null) {
            $payload['principalId'] = $this->principalId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
