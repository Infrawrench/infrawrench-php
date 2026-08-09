<?php

/*
 * infrawrench/sdk v1.2.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.2.0).
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

final class StatusPagePatch implements \JsonSerializable
{
    /**
     * @param list<StatusPageComponentInput>|null $components When present, replaces the whole set.
     */
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?bool $published = null,
        public readonly ?bool $showHistory = null,
        public readonly ?bool $showUptime = null,
        public readonly ?string $supportUrl = null,
        public readonly ?array $components = null,
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
            title: Coerce::toStringOrNull($data['title'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            published: Coerce::toBoolOrNull($data['published'] ?? null),
            showHistory: Coerce::toBoolOrNull($data['showHistory'] ?? null),
            showUptime: Coerce::toBoolOrNull($data['showUptime'] ?? null),
            supportUrl: Coerce::toStringOrNull($data['supportUrl'] ?? null),
            components: Coerce::nullable($data['components'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): StatusPageComponentInput => StatusPageComponentInput::fromArray(Coerce::toArray($item)))),
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
        ];
        if ($this->title !== null) {
            $payload['title'] = $this->title;
        }
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->published !== null) {
            $payload['published'] = $this->published;
        }
        if ($this->showHistory !== null) {
            $payload['showHistory'] = $this->showHistory;
        }
        if ($this->showUptime !== null) {
            $payload['showUptime'] = $this->showUptime;
        }
        if ($this->supportUrl !== null) {
            $payload['supportUrl'] = $this->supportUrl;
        }
        if ($this->components !== null) {
            $payload['components'] = array_map(static fn (StatusPageComponentInput $item): array => $item->toArray(), $this->components);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
