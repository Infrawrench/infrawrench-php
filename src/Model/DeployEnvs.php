<?php

/*
 * infrawrench/sdk v0.24.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.24.0).
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

final class DeployEnvs implements \JsonSerializable
{
    /** @param list<string> $envs */
    public function __construct(
        public readonly array $envs,
        public readonly string $sha,
        public readonly string $repo,
        public readonly string $branch,
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
            envs: Coerce::mapList($data['envs'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            sha: Coerce::toString($data['sha'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            branch: Coerce::toString($data['branch'] ?? null),
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
            'envs' => $this->envs,
            'sha' => $this->sha,
            'repo' => $this->repo,
            'branch' => $this->branch,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
