<?php

/*
 * infrawrench/sdk v1.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.14.0).
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

final class SharedConsoleParticipant implements \JsonSerializable
{
    /**
     * @param string|null $userName Display-name snapshot taken when they joined.
     * @param 'observer'|'driver' $role `driver` holds the keyboard; `observer` sees the terminal and cannot type into it. Exactly one participant per console is a driver at any moment, enforced by a partial unique index rather than by the application — two simultaneous handovers cannot both win.
     * @param 'joined'|'left'|'removed' $status `left` walked away and may resume on the same row without a new invite; `removed` was ejected or lost the permission mid-session and needs a fresh one.
     * @param string|null $driverRequestedAt Set when this participant has asked for the keyboard and nobody has answered yet. Asking grants nothing — only the current driver or the sharer can move it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $userId,
        public readonly ?string $userName,
        public readonly string $role,
        public readonly string $status,
        public readonly ?string $driverRequestedAt,
        public readonly string $joinedAt,
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
            role: Coerce::toString($data['role'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            driverRequestedAt: Coerce::toStringOrNull($data['driverRequestedAt'] ?? null),
            joinedAt: Coerce::toString($data['joinedAt'] ?? null),
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
            'role' => $this->role,
            'status' => $this->status,
            'driverRequestedAt' => $this->driverRequestedAt,
            'joinedAt' => $this->joinedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
