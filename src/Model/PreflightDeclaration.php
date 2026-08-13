<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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
 * Declared when the plugin supports credential preflight (per-capability permission checks).
 * `null` for plugins without it.
 *
 * The API may send `null` in place of this object.
 */
final class PreflightDeclaration implements \JsonSerializable
{
    /**
     * @param list<PreflightCapability> $capabilities
     * @param array{label: string, language: 'json'|'yaml'|'text'}|null $templateFormat
     */
    public function __construct(
        public readonly array $capabilities,
        public readonly ?array $templateFormat = null,
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
            capabilities: Coerce::mapList($data['capabilities'] ?? null, static fn (mixed $item): PreflightCapability => PreflightCapability::fromArray(Coerce::toArray($item))),
            templateFormat: Coerce::toArrayOrNull($data['templateFormat'] ?? null),
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
            'capabilities' => array_map(static fn (PreflightCapability $item): array => $item->toArray(), $this->capabilities),
        ];
        if ($this->templateFormat !== null) {
            $payload['templateFormat'] = $this->templateFormat;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
