<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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

final class BlastRadiusReference implements \JsonSerializable
{
    /**
     * @param string $kind What kind of object names the resource.
     * @param string $id The referring object's own id.
     * @param string|null $detail One extra clause of context.
     * @param bool|null $userFacing Set when the reference is visible outside the organization — a published status page component, or the probe behind one. Any user-facing reference makes the report high severity on its own.
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $detail = null,
        public readonly ?bool $userFacing = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            detail: Coerce::toStringOrNull($data['detail'] ?? null),
            userFacing: Coerce::toBoolOrNull($data['userFacing'] ?? null),
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
            'kind' => $this->kind,
            'id' => $this->id,
            'name' => $this->name,
        ];
        if ($this->detail !== null) {
            $payload['detail'] = $this->detail;
        }
        if ($this->userFacing !== null) {
            $payload['userFacing'] = $this->userFacing;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
