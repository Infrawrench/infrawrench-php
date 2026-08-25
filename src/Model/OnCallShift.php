<?php

/*
 * infrawrench/sdk v1.37.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.37.0).
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

/** The API may send `null` in place of this object. */
final class OnCallShift implements \JsonSerializable
{
    /** @param 'rotation'|'override' $source */
    public function __construct(
        public readonly string $startsAt,
        public readonly string $endsAt,
        public readonly string $userId,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly string $source,
        public readonly ?int $rotationIndex,
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
            startsAt: Coerce::toString($data['startsAt'] ?? null),
            endsAt: Coerce::toString($data['endsAt'] ?? null),
            userId: Coerce::toString($data['userId'] ?? null),
            name: Coerce::toStringOrNull($data['name'] ?? null),
            email: Coerce::toStringOrNull($data['email'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            rotationIndex: Coerce::toIntOrNull($data['rotationIndex'] ?? null),
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
            'startsAt' => $this->startsAt,
            'endsAt' => $this->endsAt,
            'userId' => $this->userId,
            'name' => $this->name,
            'email' => $this->email,
            'source' => $this->source,
            'rotationIndex' => $this->rotationIndex,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
