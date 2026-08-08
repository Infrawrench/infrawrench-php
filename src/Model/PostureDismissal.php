<?php

/*
 * infrawrench/sdk v0.43.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.43.0).
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

final class PostureDismissal implements \JsonSerializable
{
    /**
     * @param string $dismissedAt When the finding was accepted.
     * @param string|null $dismissedBy Display name or email of whoever accepted it; null when unknown.
     * @param string|null $reason The operator's note, when they left one.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $ruleId,
        public readonly string $dismissedAt,
        public readonly ?string $dismissedBy,
        public readonly ?string $reason,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            dismissedAt: Coerce::toString($data['dismissedAt'] ?? null),
            dismissedBy: Coerce::toStringOrNull($data['dismissedBy'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
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
            'resourceId' => $this->resourceId,
            'ruleId' => $this->ruleId,
            'dismissedAt' => $this->dismissedAt,
            'dismissedBy' => $this->dismissedBy,
            'reason' => $this->reason,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
