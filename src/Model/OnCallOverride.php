<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class OnCallOverride implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $scheduleId,
        public readonly string $userId,
        public readonly ?string $userName,
        public readonly string $startsAt,
        public readonly string $endsAt,
        public readonly ?string $reason,
        public readonly ?string $createdByUserId,
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
            scheduleId: Coerce::toString($data['scheduleId'] ?? null),
            userId: Coerce::toString($data['userId'] ?? null),
            userName: Coerce::toStringOrNull($data['userName'] ?? null),
            startsAt: Coerce::toString($data['startsAt'] ?? null),
            endsAt: Coerce::toString($data['endsAt'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
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
            'scheduleId' => $this->scheduleId,
            'userId' => $this->userId,
            'userName' => $this->userName,
            'startsAt' => $this->startsAt,
            'endsAt' => $this->endsAt,
            'reason' => $this->reason,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
