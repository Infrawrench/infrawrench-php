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

final class CiStatus implements \JsonSerializable
{
    /**
     * @param bool $enabled CI is turned on for this organization
     * @param bool $configured The runner pool is configured on this server
     * @param list<CiAccount> $accounts
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly bool $configured,
        public readonly bool $githubConfigured,
        public readonly bool $planIncludesCi,
        public readonly array $accounts,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            configured: Coerce::toBool($data['configured'] ?? null),
            githubConfigured: Coerce::toBool($data['githubConfigured'] ?? null),
            planIncludesCi: Coerce::toBool($data['planIncludesCi'] ?? null),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): CiAccount => CiAccount::fromArray(Coerce::toArray($item))),
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
            'enabled' => $this->enabled,
            'configured' => $this->configured,
            'githubConfigured' => $this->githubConfigured,
            'planIncludesCi' => $this->planIncludesCi,
            'accounts' => array_map(static fn (CiAccount $item): array => $item->toArray(), $this->accounts),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
