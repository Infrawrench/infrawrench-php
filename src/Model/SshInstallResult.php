<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class SshInstallResult implements \JsonSerializable
{
    /**
     * @param list<string>|null $warnings
     * @param string|null $ref Opaque, plugin-owned handle to what was installed (e.g. a tailnet device id).
     */
    public function __construct(
        public readonly string $message,
        public readonly ?string $address = null,
        public readonly ?array $warnings = null,
        public readonly ?string $ref = null,
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
            message: Coerce::toString($data['message'] ?? null),
            address: Coerce::toStringOrNull($data['address'] ?? null),
            warnings: Coerce::nullable($data['warnings'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            ref: Coerce::toStringOrNull($data['ref'] ?? null),
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
            'message' => $this->message,
        ];
        if ($this->address !== null) {
            $payload['address'] = $this->address;
        }
        if ($this->warnings !== null) {
            $payload['warnings'] = $this->warnings;
        }
        if ($this->ref !== null) {
            $payload['ref'] = $this->ref;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
