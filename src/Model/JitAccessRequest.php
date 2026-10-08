<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class JitAccessRequest implements \JsonSerializable
{
    /**
     * @param 'user'|'group' $principalKind
     * @param bool $principalMatched True when the principal was resolved from the requester's own email.
     * @param JitRequestStatus::* $status
     * @param bool $preexisting The principal already held the role; nothing was created and nothing is removed.
     * @param 'expired'|'revoked'|'grant_failed'|null $endReason
     */
    public function __construct(
        public readonly string $id,
        public readonly ?string $policyId,
        public readonly ?string $policyName,
        public readonly string $accountId,
        public readonly ?string $accountName,
        public readonly string $pluginId,
        public readonly string $scopeId,
        public readonly string $scopeName,
        public readonly string $roleId,
        public readonly string $roleName,
        public readonly string $userId,
        public readonly ?string $userName,
        public readonly string $principalId,
        public readonly string $principalName,
        public readonly string $principalKind,
        public readonly bool $principalMatched,
        public readonly string $reason,
        public readonly ?string $ticket,
        public readonly int $durationMinutes,
        public readonly string $status,
        public readonly string $requestExpiresAt,
        public readonly ?string $decidedAt,
        public readonly ?string $decidedByUserId,
        public readonly ?string $decidedByName,
        public readonly ?string $decisionNote,
        public readonly bool $selfApproved,
        public readonly ?string $incidentId,
        public readonly ?string $grantedAt,
        public readonly ?string $grantExpiresAt,
        public readonly bool $preexisting,
        public readonly int $extendedMinutes,
        public readonly ?string $endedAt,
        public readonly ?string $endedByName,
        public readonly ?string $endReason,
        public readonly ?string $lastError,
        public readonly int $revokeAttempts,
        public readonly string $createdAt,
        public readonly bool $canDecide,
        public readonly bool $canCancel,
        public readonly bool $canExtend,
        public readonly bool $canRevoke,
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
            policyId: Coerce::toStringOrNull($data['policyId'] ?? null),
            policyName: Coerce::toStringOrNull($data['policyName'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            scopeId: Coerce::toString($data['scopeId'] ?? null),
            scopeName: Coerce::toString($data['scopeName'] ?? null),
            roleId: Coerce::toString($data['roleId'] ?? null),
            roleName: Coerce::toString($data['roleName'] ?? null),
            userId: Coerce::toString($data['userId'] ?? null),
            userName: Coerce::toStringOrNull($data['userName'] ?? null),
            principalId: Coerce::toString($data['principalId'] ?? null),
            principalName: Coerce::toString($data['principalName'] ?? null),
            principalKind: Coerce::toString($data['principalKind'] ?? null),
            principalMatched: Coerce::toBool($data['principalMatched'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            ticket: Coerce::toStringOrNull($data['ticket'] ?? null),
            durationMinutes: Coerce::toInt($data['durationMinutes'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            requestExpiresAt: Coerce::toString($data['requestExpiresAt'] ?? null),
            decidedAt: Coerce::toStringOrNull($data['decidedAt'] ?? null),
            decidedByUserId: Coerce::toStringOrNull($data['decidedByUserId'] ?? null),
            decidedByName: Coerce::toStringOrNull($data['decidedByName'] ?? null),
            decisionNote: Coerce::toStringOrNull($data['decisionNote'] ?? null),
            selfApproved: Coerce::toBool($data['selfApproved'] ?? null),
            incidentId: Coerce::toStringOrNull($data['incidentId'] ?? null),
            grantedAt: Coerce::toStringOrNull($data['grantedAt'] ?? null),
            grantExpiresAt: Coerce::toStringOrNull($data['grantExpiresAt'] ?? null),
            preexisting: Coerce::toBool($data['preexisting'] ?? null),
            extendedMinutes: Coerce::toInt($data['extendedMinutes'] ?? null),
            endedAt: Coerce::toStringOrNull($data['endedAt'] ?? null),
            endedByName: Coerce::toStringOrNull($data['endedByName'] ?? null),
            endReason: Coerce::toStringOrNull($data['endReason'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            revokeAttempts: Coerce::toInt($data['revokeAttempts'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            canDecide: Coerce::toBool($data['canDecide'] ?? null),
            canCancel: Coerce::toBool($data['canCancel'] ?? null),
            canExtend: Coerce::toBool($data['canExtend'] ?? null),
            canRevoke: Coerce::toBool($data['canRevoke'] ?? null),
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
            'policyId' => $this->policyId,
            'policyName' => $this->policyName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'scopeId' => $this->scopeId,
            'scopeName' => $this->scopeName,
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
            'userId' => $this->userId,
            'userName' => $this->userName,
            'principalId' => $this->principalId,
            'principalName' => $this->principalName,
            'principalKind' => $this->principalKind,
            'principalMatched' => $this->principalMatched,
            'reason' => $this->reason,
            'ticket' => $this->ticket,
            'durationMinutes' => $this->durationMinutes,
            'status' => $this->status,
            'requestExpiresAt' => $this->requestExpiresAt,
            'decidedAt' => $this->decidedAt,
            'decidedByUserId' => $this->decidedByUserId,
            'decidedByName' => $this->decidedByName,
            'decisionNote' => $this->decisionNote,
            'selfApproved' => $this->selfApproved,
            'incidentId' => $this->incidentId,
            'grantedAt' => $this->grantedAt,
            'grantExpiresAt' => $this->grantExpiresAt,
            'preexisting' => $this->preexisting,
            'extendedMinutes' => $this->extendedMinutes,
            'endedAt' => $this->endedAt,
            'endedByName' => $this->endedByName,
            'endReason' => $this->endReason,
            'lastError' => $this->lastError,
            'revokeAttempts' => $this->revokeAttempts,
            'createdAt' => $this->createdAt,
            'canDecide' => $this->canDecide,
            'canCancel' => $this->canCancel,
            'canExtend' => $this->canExtend,
            'canRevoke' => $this->canRevoke,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
