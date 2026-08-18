<?php

/*
 * infrawrench/sdk v1.31.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.31.0).
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

final class DeployTrigger implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $repo,
        public readonly string $branch,
        public readonly string $env,
        public readonly bool $enabled,
        public readonly ?string $lastSha,
        public readonly ?string $lastRunAt,
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
            id: Coerce::toString($data['id'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            branch: Coerce::toString($data['branch'] ?? null),
            env: Coerce::toString($data['env'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            lastSha: Coerce::toStringOrNull($data['lastSha'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
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
            'id' => $this->id,
            'repo' => $this->repo,
            'branch' => $this->branch,
            'env' => $this->env,
            'enabled' => $this->enabled,
            'lastSha' => $this->lastSha,
            'lastRunAt' => $this->lastRunAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
