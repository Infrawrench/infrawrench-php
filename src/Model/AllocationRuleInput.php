<?php

/*
 * infrawrench/sdk v1.2.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.2.0).
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

final class AllocationRuleInput implements \JsonSerializable
{
    /** @param int $priority Lower fires first; the first matching rule wins. */
    public function __construct(
        public readonly string $costCentreId,
        public readonly int $priority,
        public readonly AllocationRuleMatch $match,
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
            costCentreId: Coerce::toString($data['costCentreId'] ?? null),
            priority: Coerce::toInt($data['priority'] ?? null),
            match: AllocationRuleMatch::fromArray(Coerce::toArray($data['match'] ?? null)),
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
            'costCentreId' => $this->costCentreId,
            'priority' => $this->priority,
            'match' => $this->match->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
