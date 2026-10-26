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

/**
 * `data` of a `jit_access.approved` event, version 1. An approver approved a just-in-time access
 * request.
 *
 * Spec schema: `EventData_jit_access_approved_v1`.
 */
final class EventDataJitAccessApprovedV1 implements \JsonSerializable
{
    /**
     * @param string $requestId Just-in-time access request id.
     * @param string $accountId The account the role is granted through.
     * @param string $pluginId Provider plugin id.
     * @param string $scopeId Scope the role applies to (project, subscription, account).
     * @param string $roleId The provider role.
     * @param string|null $principalId Provider principal receiving the role.
     * @param string $requesterUserId Infrawrench user who asked.
     * @param string|null $actorName Who caused this change; null for the expiry sweep.
     * @param int|null $durationMinutes Requested duration.
     */
    public function __construct(
        public readonly string $requestId,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $scopeId,
        public readonly string $roleId,
        public readonly ?string $principalId,
        public readonly string $requesterUserId,
        public readonly ?string $actorName,
        public readonly ?int $durationMinutes,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            scopeId: Coerce::toString($data['scopeId'] ?? null),
            roleId: Coerce::toString($data['roleId'] ?? null),
            principalId: Coerce::toStringOrNull($data['principalId'] ?? null),
            requesterUserId: Coerce::toString($data['requesterUserId'] ?? null),
            actorName: Coerce::toStringOrNull($data['actorName'] ?? null),
            durationMinutes: Coerce::toIntOrNull($data['durationMinutes'] ?? null),
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
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'scopeId' => $this->scopeId,
            'roleId' => $this->roleId,
            'principalId' => $this->principalId,
            'requesterUserId' => $this->requesterUserId,
            'actorName' => $this->actorName,
            'durationMinutes' => $this->durationMinutes,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
