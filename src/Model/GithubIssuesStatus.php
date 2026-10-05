<?php

/*
 * infrawrench/sdk v1.63.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.63.0).
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

final class GithubIssuesStatus implements \JsonSerializable
{
    /** @param list<GithubInstallationAccess> $installations */
    public function __construct(
        public readonly bool $appConfigured,
        public readonly array $installations,
        public readonly GithubIssueSettings $settings,
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
            installations: Coerce::mapList($data['installations'] ?? null, static fn (mixed $item): GithubInstallationAccess => GithubInstallationAccess::fromArray(Coerce::toArray($item))),
            settings: GithubIssueSettings::fromArray(Coerce::toArray($data['settings'] ?? null)),
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
            'installations' => array_map(static fn (GithubInstallationAccess $item): array => $item->toArray(), $this->installations),
            'settings' => $this->settings->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
