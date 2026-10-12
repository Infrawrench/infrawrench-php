<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

final class DoraDeploymentInput implements \JsonSerializable
{
    /**
     * @param string $externalId Your id for the deploy (max 200). Sending it again updates the same deploy.
     * @param string $name What was deployed, as a person calls it (max 300).
     * @param string $environment Environment name, matched against the production patterns.
     * @param string|null $repository `owner/name` or a repository URL.
     * @param string|null $commitSha Hexadecimal, 7-64 characters.
     * @param string|null $commitAt When the commit was authored, if known.
     * @param 'success'|'failure'|'in_progress'|'canceled'|null $status Defaults to `success`.
     */
    public function __construct(
        public readonly string $externalId,
        public readonly string $name,
        public readonly string $environment,
        public readonly string $deployedAt,
        public readonly ?string $repository = null,
        public readonly ?string $commitSha = null,
        public readonly ?string $commitAt = null,
        public readonly ?string $status = null,
        public readonly ?bool $isRollback = null,
        public readonly ?string $url = null,
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
            externalId: Coerce::toString($data['externalId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            environment: Coerce::toString($data['environment'] ?? null),
            deployedAt: Coerce::toString($data['deployedAt'] ?? null),
            repository: Coerce::toStringOrNull($data['repository'] ?? null),
            commitSha: Coerce::toStringOrNull($data['commitSha'] ?? null),
            commitAt: Coerce::toStringOrNull($data['commitAt'] ?? null),
            status: Coerce::toStringOrNull($data['status'] ?? null),
            isRollback: Coerce::toBoolOrNull($data['isRollback'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
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
            'externalId' => $this->externalId,
            'name' => $this->name,
            'environment' => $this->environment,
            'deployedAt' => $this->deployedAt,
        ];
        if ($this->repository !== null) {
            $payload['repository'] = $this->repository;
        }
        if ($this->commitSha !== null) {
            $payload['commitSha'] = $this->commitSha;
        }
        if ($this->commitAt !== null) {
            $payload['commitAt'] = $this->commitAt;
        }
        if ($this->status !== null) {
            $payload['status'] = $this->status;
        }
        if ($this->isRollback !== null) {
            $payload['isRollback'] = $this->isRollback;
        }
        if ($this->url !== null) {
            $payload['url'] = $this->url;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
