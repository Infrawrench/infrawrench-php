<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class WallboardTile implements \JsonSerializable
{
    /**
     * @param string $value The number or short phrase, rendered in large type.
     * @param 'ok'|'degraded'|'down' $status Three states rather than five, because at four metres a person distinguishes three colours reliably and nothing more. `down` is reserved for the two things that mean customers are affected now — a sev1 incident or a probe that is down; everything else that is wrong is `degraded`. A source that could not be read is `degraded` and never `ok`.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly string $value,
        public readonly ?string $detail,
        public readonly string $status,
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
            label: Coerce::toString($data['label'] ?? null),
            value: Coerce::toString($data['value'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
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
            'label' => $this->label,
            'value' => $this->value,
            'detail' => $this->detail,
            'status' => $this->status,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
