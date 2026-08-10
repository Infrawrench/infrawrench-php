<?php

/*
 * infrawrench/sdk v1.6.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.6.0).
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

final class StatusPage implements \JsonSerializable
{
    /**
     * @param string $slug The public URL segment, and the page's only access credential. Generated with real entropy rather than derived from the title.
     * @param bool $published False until deliberately published; a fresh page is never reachable.
     * @param list<StatusPageComponent> $components
     */
    public function __construct(
        public readonly string $id,
        public readonly string $slug,
        public readonly string $title,
        public readonly ?string $description,
        public readonly bool $published,
        public readonly bool $showHistory,
        public readonly bool $showUptime,
        public readonly ?string $supportUrl,
        public readonly array $components,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            slug: Coerce::toString($data['slug'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            published: Coerce::toBool($data['published'] ?? null),
            showHistory: Coerce::toBool($data['showHistory'] ?? null),
            showUptime: Coerce::toBool($data['showUptime'] ?? null),
            supportUrl: Coerce::toStringOrNull($data['supportUrl'] ?? null),
            components: Coerce::mapList($data['components'] ?? null, static fn (mixed $item): StatusPageComponent => StatusPageComponent::fromArray(Coerce::toArray($item))),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'published' => $this->published,
            'showHistory' => $this->showHistory,
            'showUptime' => $this->showUptime,
            'supportUrl' => $this->supportUrl,
            'components' => array_map(static fn (StatusPageComponent $item): array => $item->toArray(), $this->components),
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
