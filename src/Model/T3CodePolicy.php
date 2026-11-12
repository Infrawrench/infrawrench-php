<?php

/*
 * infrawrench/sdk v1.103.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.103.0).
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

final class T3CodePolicy implements \JsonSerializable
{
    /**
     * @param string $organization Shown to users as "Managed by <organization>".
     * @param array<string, array{value?: mixed, locked: bool}>|null $settings Keyed by the setting's dot path in T3 Code's settings.json. `locked: false` sets a default users can change; `locked: true` pins it.
     * @param array<string, mixed>|null $limits
     */
    public function __construct(
        public readonly float $schemaVersion,
        public readonly string $organization,
        public readonly ?string $supportUrl = null,
        public readonly ?array $settings = null,
        public readonly ?array $limits = null,
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
            schemaVersion: Coerce::toFloat($data['schemaVersion'] ?? null),
            organization: Coerce::toString($data['organization'] ?? null),
            supportUrl: Coerce::toStringOrNull($data['supportUrl'] ?? null),
            settings: Coerce::nullable($data['settings'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): array => Coerce::toArray($item))),
            limits: Coerce::toArrayOrNull($data['limits'] ?? null),
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
            'schemaVersion' => $this->schemaVersion,
            'organization' => $this->organization,
        ];
        if ($this->supportUrl !== null) {
            $payload['supportUrl'] = $this->supportUrl;
        }
        if ($this->settings !== null) {
            $payload['settings'] = $this->settings;
        }
        if ($this->limits !== null) {
            $payload['limits'] = $this->limits;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
