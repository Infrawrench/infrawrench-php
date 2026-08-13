<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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

final class ResourceLeaseUpdate implements \JsonSerializable
{
    /**
     * @param bool|null $autoDelete Requires the `resources:delete` permission when set to true.
     * @param string|null $note `null` clears the note.
     */
    public function __construct(
        public readonly ?string $expiresAt = null,
        public readonly ?bool $autoDelete = null,
        public readonly ?string $note = null,
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
            expiresAt: Coerce::toStringOrNull($data['expiresAt'] ?? null),
            autoDelete: Coerce::toBoolOrNull($data['autoDelete'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
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
        ];
        if ($this->expiresAt !== null) {
            $payload['expiresAt'] = $this->expiresAt;
        }
        if ($this->autoDelete !== null) {
            $payload['autoDelete'] = $this->autoDelete;
        }
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
