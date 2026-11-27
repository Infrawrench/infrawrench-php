<?php

/*
 * infrawrench/sdk v1.135.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.135.0).
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

final class GitForgeNamespace implements \JsonSerializable
{
    /**
     * @param string $slug The first path segment of every repository URL, as its owner spelled it.
     * @param string $url The namespace's page on the forge.
     * @param GitForgeVisibility::* $defaultVisibility
     */
    public function __construct(
        public readonly string $slug,
        public readonly string $url,
        public readonly string $defaultVisibility,
        public readonly string $createdAt,
        public readonly ?string $renamedAt,
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
            slug: Coerce::toString($data['slug'] ?? null),
            url: Coerce::toString($data['url'] ?? null),
            defaultVisibility: Coerce::toString($data['defaultVisibility'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            renamedAt: Coerce::toStringOrNull($data['renamedAt'] ?? null),
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
            'slug' => $this->slug,
            'url' => $this->url,
            'defaultVisibility' => $this->defaultVisibility,
            'createdAt' => $this->createdAt,
            'renamedAt' => $this->renamedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
