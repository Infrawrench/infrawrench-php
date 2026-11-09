<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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

final class GithubAppStatus implements \JsonSerializable
{
    /**
     * @param bool $configured Whether this server has a GitHub App configured at all.
     * @param string|null $appSlug The GitHub App's slug, as in `github.com/apps/<slug>`.
     * @param list<array{installationId: int, accountLogin: string|null}> $installations The organization's connected installations.
     */
    public function __construct(
        public readonly bool $configured,
        public readonly ?string $appSlug,
        public readonly array $installations,
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
            configured: Coerce::toBool($data['configured'] ?? null),
            appSlug: Coerce::toStringOrNull($data['appSlug'] ?? null),
            installations: Coerce::mapList($data['installations'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'configured' => $this->configured,
            'appSlug' => $this->appSlug,
            'installations' => $this->installations,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
