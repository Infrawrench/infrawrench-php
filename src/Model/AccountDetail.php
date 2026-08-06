<?php

/*
 * infrawrench/sdk v0.36.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.36.0).
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

final class AccountDetail implements \JsonSerializable
{
    /**
     * @param array{id: string, pluginId: string, displayName: string} $account
     * @param list<ResourceTypeSummary> $resourceTypes
     */
    public function __construct(
        public readonly array $account,
        public readonly array $resourceTypes,
        public readonly string $pluginDisplayName,
        public readonly string $pluginLogoSvg,
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
            account: Coerce::toArray($data['account'] ?? null),
            resourceTypes: Coerce::mapList($data['resourceTypes'] ?? null, static fn (mixed $item): ResourceTypeSummary => ResourceTypeSummary::fromArray(Coerce::toArray($item))),
            pluginDisplayName: Coerce::toString($data['pluginDisplayName'] ?? null),
            pluginLogoSvg: Coerce::toString($data['pluginLogoSvg'] ?? null),
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
            'account' => $this->account,
            'resourceTypes' => array_map(static fn (ResourceTypeSummary $item): array => $item->toArray(), $this->resourceTypes),
            'pluginDisplayName' => $this->pluginDisplayName,
            'pluginLogoSvg' => $this->pluginLogoSvg,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
