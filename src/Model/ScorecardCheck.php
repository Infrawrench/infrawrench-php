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

final class ScorecardCheck implements \JsonSerializable
{
    /**
     * @param string $id Stable within the scorecard.
     * @param ScorecardCheckType::* $type
     * @param string|null $name Display override; the type's label when null.
     * @param int $weight 1 to 10.
     * @param array<string, float|list<string>> $params Type parameters: `minBudgetRemainingPercent` (0-100), `drillWithinDays` (1-730), `severities` (critical/high/medium/low), `tags` (tag keys), `maxFailureRatePercent` (0-100), `windowDays` (1-90).
     */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly ?string $name,
        public readonly int $weight,
        public readonly array $params,
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
            type: Coerce::toString($data['type'] ?? null),
            name: Coerce::toStringOrNull($data['name'] ?? null),
            weight: Coerce::toInt($data['weight'] ?? null),
            params: Coerce::toArray($data['params'] ?? null),
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
            'type' => $this->type,
            'name' => $this->name,
            'weight' => $this->weight,
            'params' => $this->params,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
