<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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

final class IacManagedBy implements \JsonSerializable
{
    /**
     * @param string $repository `<namespace>/<repository>` on git.infrawrench.com.
     * @param string $rootPath The Terraform root, relative to the repository. Empty for its top.
     * @param string $address The resource's address in that workspace's state.
     * @param string $url The workspace's page on git.infrawrench.com.
     */
    public function __construct(
        public readonly string $repository,
        public readonly string $rootPath,
        public readonly string $workspace,
        public readonly string $address,
        public readonly string $url,
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
            repository: Coerce::toString($data['repository'] ?? null),
            rootPath: Coerce::toString($data['rootPath'] ?? null),
            workspace: Coerce::toString($data['workspace'] ?? null),
            address: Coerce::toString($data['address'] ?? null),
            url: Coerce::toString($data['url'] ?? null),
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
            'repository' => $this->repository,
            'rootPath' => $this->rootPath,
            'workspace' => $this->workspace,
            'address' => $this->address,
            'url' => $this->url,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
