<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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

final class AccessRequest implements \JsonSerializable
{
    /**
     * @param list<string> $permissions The permission strings being asked for.
     * @param int $durationMinutes How long the elevation lasts once granted.
     * @param 'pending'|'approved'|'denied'|'expired' $status `pending` (awaiting a decision), `approved`, `denied`, or `expired` (nobody decided in time, or the requester withdrew it). An approved row is only *granting* permissions while `active` is true.
     * @param string $expiresAt When an undecided request stops being decidable.
     * @param string|null $grantExpiresAt When the elevation lapses.
     * @param bool $active True when this row is granting permissions right now. Evaluated, never swept — a grant stops applying the instant it lapses.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $userId,
        public readonly ?string $userName,
        public readonly array $permissions,
        public readonly string $reason,
        public readonly int $durationMinutes,
        public readonly string $status,
        public readonly string $expiresAt,
        public readonly ?string $decidedAt,
        public readonly ?string $decidedByUserId,
        public readonly ?string $decidedByName,
        public readonly ?string $decisionNote,
        public readonly ?string $grantedAt,
        public readonly ?string $grantExpiresAt,
        public readonly ?string $revokedAt,
        public readonly ?string $revokedByName,
        public readonly bool $active,
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
            userId: Coerce::toString($data['userId'] ?? null),
            userName: Coerce::toStringOrNull($data['userName'] ?? null),
            permissions: Coerce::mapList($data['permissions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            reason: Coerce::toString($data['reason'] ?? null),
            durationMinutes: Coerce::toInt($data['durationMinutes'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            decidedAt: Coerce::toStringOrNull($data['decidedAt'] ?? null),
            decidedByUserId: Coerce::toStringOrNull($data['decidedByUserId'] ?? null),
            decidedByName: Coerce::toStringOrNull($data['decidedByName'] ?? null),
            decisionNote: Coerce::toStringOrNull($data['decisionNote'] ?? null),
            grantedAt: Coerce::toStringOrNull($data['grantedAt'] ?? null),
            grantExpiresAt: Coerce::toStringOrNull($data['grantExpiresAt'] ?? null),
            revokedAt: Coerce::toStringOrNull($data['revokedAt'] ?? null),
            revokedByName: Coerce::toStringOrNull($data['revokedByName'] ?? null),
            active: Coerce::toBool($data['active'] ?? null),
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
            'userId' => $this->userId,
            'userName' => $this->userName,
            'permissions' => $this->permissions,
            'reason' => $this->reason,
            'durationMinutes' => $this->durationMinutes,
            'status' => $this->status,
            'expiresAt' => $this->expiresAt,
            'decidedAt' => $this->decidedAt,
            'decidedByUserId' => $this->decidedByUserId,
            'decidedByName' => $this->decidedByName,
            'decisionNote' => $this->decisionNote,
            'grantedAt' => $this->grantedAt,
            'grantExpiresAt' => $this->grantExpiresAt,
            'revokedAt' => $this->revokedAt,
            'revokedByName' => $this->revokedByName,
            'active' => $this->active,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
