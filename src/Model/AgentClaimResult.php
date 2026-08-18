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

final class AgentClaimResult implements \JsonSerializable
{
    /**
     * @param string $organizationId The organization the agent acts in from now on.
     * @param 'adopt'|'merge' $mode
     */
    public function __construct(
        public readonly string $organizationId,
        public readonly string $mode,
        public readonly int $accountsMoved,
        public readonly bool $historyMoved,
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
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            mode: Coerce::toString($data['mode'] ?? null),
            accountsMoved: Coerce::toInt($data['accountsMoved'] ?? null),
            historyMoved: Coerce::toBool($data['historyMoved'] ?? null),
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
            'organizationId' => $this->organizationId,
            'mode' => $this->mode,
            'accountsMoved' => $this->accountsMoved,
            'historyMoved' => $this->historyMoved,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
