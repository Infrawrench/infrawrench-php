<?php

/*
 * infrawrench/sdk v1.20.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.20.0).
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

final class CostReportFilter implements \JsonSerializable
{
    /**
     * @param 'provider'|'account'|'service'|'region'|'resource'|'tag'|'charge_type'|'commitment' $dimension
     * @param 'in'|'not_in' $op
     * @param list<string> $values
     */
    public function __construct(
        public readonly string $dimension,
        public readonly string $op,
        public readonly array $values,
        public readonly ?string $tagKey = null,
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
            dimension: Coerce::toString($data['dimension'] ?? null),
            op: Coerce::toString($data['op'] ?? null),
            values: Coerce::mapList($data['values'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
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
            'dimension' => $this->dimension,
            'op' => $this->op,
            'values' => $this->values,
        ];
        if ($this->tagKey !== null) {
            $payload['tagKey'] = $this->tagKey;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
