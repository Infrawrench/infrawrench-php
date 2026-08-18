<?php

/*
 * infrawrench/sdk v1.28.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.28.0).
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

final class InviteRequest implements \JsonSerializable
{
    /**
     * @param OrganizationRole::*|null $role
     * @param bool|null $addSeat When the paid plan is full (409 seat_limit_reached), retry with this set to buy one more monthly seat and send the invitation. Requires billing:write. Only works when the 409 reported `canAddSeat: true` — an org whose capacity is entirely prepaid capacity slots has no monthly seat to add.
     */
    public function __construct(
        public readonly string $email,
        public readonly ?string $role = null,
        public readonly ?string $roleId = null,
        public readonly ?bool $addSeat = null,
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
            email: Coerce::toString($data['email'] ?? null),
            role: Coerce::toStringOrNull($data['role'] ?? null),
            roleId: Coerce::toStringOrNull($data['roleId'] ?? null),
            addSeat: Coerce::toBoolOrNull($data['addSeat'] ?? null),
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
            'email' => $this->email,
        ];
        if ($this->role !== null) {
            $payload['role'] = $this->role;
        }
        if ($this->roleId !== null) {
            $payload['roleId'] = $this->roleId;
        }
        if ($this->addSeat !== null) {
            $payload['addSeat'] = $this->addSeat;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
