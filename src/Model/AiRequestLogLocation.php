<?php

/*
 * infrawrench/sdk v1.66.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.66.0).
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

final class AiRequestLogLocation implements \JsonSerializable
{
    /** @param array<string, string> $location */
    public function __construct(
        public readonly string $id,
        public readonly string $label,
        public readonly array $location,
        public readonly ?string $detail = null,
        public readonly ?bool $recommended = null,
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
            location: Coerce::mapValues($data['location'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            recommended: Coerce::toBoolOrNull($data['recommended'] ?? null),
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
            'id' => $this->id,
            'label' => $this->label,
            'location' => $this->location,
        ];
        if ($this->detail !== null) {
            $payload['detail'] = $this->detail;
        }
        if ($this->recommended !== null) {
            $payload['recommended'] = $this->recommended;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
