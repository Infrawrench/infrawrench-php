<?php

/*
 * infrawrench/sdk v1.0.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.0.0).
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

final class DeploymentRun implements \JsonSerializable
{
    /**
     * @param DeployStatus::* $status
     * @param 'web'|'cli'|'trigger' $origin
     * @param DeployStage::*|null $stage
     * @param 'cloud-build'|'ssh'|null $buildRunner
     */
    public function __construct(
        public readonly string $id,
        public readonly string $env,
        public readonly ?string $repo,
        public readonly ?string $branch,
        public readonly ?string $gitSha,
        public readonly ?string $image,
        public readonly string $status,
        public readonly string $origin,
        public readonly ?string $stage,
        public readonly ?int $durationMs,
        public readonly ?int $buildSeconds,
        public readonly ?string $buildRunner,
        public readonly string $startedAt,
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
            env: Coerce::toString($data['env'] ?? null),
            repo: Coerce::toStringOrNull($data['repo'] ?? null),
            branch: Coerce::toStringOrNull($data['branch'] ?? null),
            gitSha: Coerce::toStringOrNull($data['gitSha'] ?? null),
            image: Coerce::toStringOrNull($data['image'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            origin: Coerce::toString($data['origin'] ?? null),
            stage: Coerce::toStringOrNull($data['stage'] ?? null),
            durationMs: Coerce::toIntOrNull($data['durationMs'] ?? null),
            buildSeconds: Coerce::toIntOrNull($data['buildSeconds'] ?? null),
            buildRunner: Coerce::toStringOrNull($data['buildRunner'] ?? null),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
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
            'env' => $this->env,
            'repo' => $this->repo,
            'branch' => $this->branch,
            'gitSha' => $this->gitSha,
            'image' => $this->image,
            'status' => $this->status,
            'origin' => $this->origin,
            'stage' => $this->stage,
            'durationMs' => $this->durationMs,
            'buildSeconds' => $this->buildSeconds,
            'buildRunner' => $this->buildRunner,
            'startedAt' => $this->startedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
