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

final class ResourceReportColumn implements \JsonSerializable
{
    /**
     * @param string $id `<kind>:<key>`. `core:name|type|provider|account|region|status|created|external_id`; `field:<key>` a key of the resource's synced fields (offered by `GET /resource-reports/options`); `tag:<key>` a provider tag; `vtag:<key>` a virtual tag, read from the resource's own cost rows over `costRange` (the value holding the most spend); `cost:range|mtd|previous_month` spend joined by provider resource id.
     * @param 'core'|'field'|'tag'|'vtag'|'cost' $kind
     * @param string $label English label, as the CSV header prints it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $key,
        public readonly string $label,
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
            kind: Coerce::toString($data['kind'] ?? null),
            key: Coerce::toString($data['key'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
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
            'kind' => $this->kind,
            'key' => $this->key,
            'label' => $this->label,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
