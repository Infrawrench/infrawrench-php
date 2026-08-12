<?php

/*
 * infrawrench/sdk v1.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.19.0).
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

final class ConnectTemplatesResponse implements \JsonSerializable
{
    /**
     * @param list<SecretExportTemplate> $templates
     * @param list<string> $namespaces
     */
    public function __construct(
        public readonly array $templates,
        public readonly string $effectiveResourceTypeId,
        public readonly bool $supportsSecretImport,
        public readonly array $namespaces,
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
            templates: Coerce::mapList($data['templates'] ?? null, static fn (mixed $item): SecretExportTemplate => SecretExportTemplate::fromArray(Coerce::toArray($item))),
            effectiveResourceTypeId: Coerce::toString($data['effectiveResourceTypeId'] ?? null),
            supportsSecretImport: Coerce::toBool($data['supportsSecretImport'] ?? null),
            namespaces: Coerce::mapList($data['namespaces'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'templates' => array_map(static fn (SecretExportTemplate $item): array => $item->toArray(), $this->templates),
            'effectiveResourceTypeId' => $this->effectiveResourceTypeId,
            'supportsSecretImport' => $this->supportsSecretImport,
            'namespaces' => $this->namespaces,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
