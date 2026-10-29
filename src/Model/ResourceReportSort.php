<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

/**
 * Null sorts by name, ascending.
 *
 * The API may send `null` in place of this object.
 */
final class ResourceReportSort implements \JsonSerializable
{
    /**
     * @param string $column `<kind>:<key>`. `core:name|type|provider|account|region|status|created|external_id`; `field:<key>` a key of the resource's synced fields (offered by `GET /resource-reports/options`); `tag:<key>` a provider tag; `vtag:<key>` a virtual tag, read from the resource's own cost rows over `costRange` (the value holding the most spend); `cost:range|mtd|previous_month` spend joined by provider resource id.
     * @param 'asc'|'desc' $direction
     */
    public function __construct(
        public readonly string $column,
        public readonly string $direction,
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
            column: Coerce::toString($data['column'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
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
            'column' => $this->column,
            'direction' => $this->direction,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
