<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PrCheckStatus implements \JsonSerializable
{
    /**
     * @param list<PrCheckInstallationAccess> $installations
     * @param list<PrCheckRepository> $repositories
     */
    public function __construct(
        public readonly bool $appConfigured,
        public readonly array $installations,
        public readonly array $repositories,
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
            appConfigured: Coerce::toBool($data['appConfigured'] ?? null),
            installations: Coerce::mapList($data['installations'] ?? null, static fn (mixed $item): PrCheckInstallationAccess => PrCheckInstallationAccess::fromArray(Coerce::toArray($item))),
            repositories: Coerce::mapList($data['repositories'] ?? null, static fn (mixed $item): PrCheckRepository => PrCheckRepository::fromArray(Coerce::toArray($item))),
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
            'appConfigured' => $this->appConfigured,
            'installations' => array_map(static fn (PrCheckInstallationAccess $item): array => $item->toArray(), $this->installations),
            'repositories' => array_map(static fn (PrCheckRepository $item): array => $item->toArray(), $this->repositories),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
