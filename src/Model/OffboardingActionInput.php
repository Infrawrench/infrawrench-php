<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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

final class OffboardingActionInput implements \JsonSerializable
{
    /**
     * @param OffboardingActionId::* $action
     * @param string|null $targetUserId The member taking over, for `transfer-ownership` and `reassign-on-call`.
     */
    public function __construct(
        public readonly string $action,
        public readonly ?string $targetUserId = null,
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
            action: Coerce::toString($data['action'] ?? null),
            targetUserId: Coerce::toStringOrNull($data['targetUserId'] ?? null),
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
            'action' => $this->action,
        ];
        if ($this->targetUserId !== null) {
            $payload['targetUserId'] = $this->targetUserId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
