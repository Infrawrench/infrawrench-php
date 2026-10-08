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

final class JitGrantIssue implements \JsonSerializable
{
    /** @param 'revoke_failed'|'overdue'|'still_present' $kind */
    public function __construct(
        public readonly string $requestId,
        public readonly string $kind,
        public readonly string $accountId,
        public readonly ?string $accountName,
        public readonly string $pluginId,
        public readonly string $scopeName,
        public readonly string $roleName,
        public readonly string $principalName,
        public readonly ?string $userName,
        public readonly ?string $grantExpiresAt,
        public readonly ?string $lastError,
        public readonly int $revokeAttempts,
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
            requestId: Coerce::toString($data['requestId'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            scopeName: Coerce::toString($data['scopeName'] ?? null),
            roleName: Coerce::toString($data['roleName'] ?? null),
            principalName: Coerce::toString($data['principalName'] ?? null),
            userName: Coerce::toStringOrNull($data['userName'] ?? null),
            grantExpiresAt: Coerce::toStringOrNull($data['grantExpiresAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            revokeAttempts: Coerce::toInt($data['revokeAttempts'] ?? null),
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
            'requestId' => $this->requestId,
            'kind' => $this->kind,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'scopeName' => $this->scopeName,
            'roleName' => $this->roleName,
            'principalName' => $this->principalName,
            'userName' => $this->userName,
            'grantExpiresAt' => $this->grantExpiresAt,
            'lastError' => $this->lastError,
            'revokeAttempts' => $this->revokeAttempts,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
