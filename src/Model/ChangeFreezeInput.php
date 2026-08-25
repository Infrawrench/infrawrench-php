<?php

/*
 * infrawrench/sdk v1.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.36.0).
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

final class ChangeFreezeInput implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $reason = null,
        public readonly ?string $startsAt = null,
        public readonly ?string $endsAt = null,
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
            name: Coerce::toString($data['name'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            startsAt: Coerce::toStringOrNull($data['startsAt'] ?? null),
            endsAt: Coerce::toStringOrNull($data['endsAt'] ?? null),
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
            'name' => $this->name,
        ];
        if ($this->reason !== null) {
            $payload['reason'] = $this->reason;
        }
        if ($this->startsAt !== null) {
            $payload['startsAt'] = $this->startsAt;
        }
        if ($this->endsAt !== null) {
            $payload['endsAt'] = $this->endsAt;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
