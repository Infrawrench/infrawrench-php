<?php

/*
 * infrawrench/sdk v1.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.25.0).
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

/**
 * A workflow. The git-webhook signing secret is deliberately absent — it is write-only, so a
 * document can neither leak nor set one.
 */
final class OrgConfigWorkflow implements \JsonSerializable
{
    /**
     * @param string $key Stable slug identifying this entity across organizations. Derived from the name on export; it is what an apply matches on, so renaming an entity while keeping its key is a rename rather than a delete-and-create.
     * @param string $source The workflow's TypeScript source.
     * @param array{kind: 'manual'}|array{kind: 'cron', expression: string, timezone?: string}|array{kind: 'git', provider?: string, repo?: string, branch?: string, events?: list<string>, installationId?: int}|array{kind: 'budget', budgetKey: string, percent?: float, metric?: 'actual'|'forecast'}|null $trigger
     * @param list<array{key: string, label: string, unit?: string|null, type?: string}>|null $metrics
     */
    public function __construct(
        public readonly string $key,
        public readonly string $name,
        public readonly string $source,
        public readonly ?string $description = null,
        public readonly ?array $trigger = null,
        public readonly ?array $metrics = null,
        public readonly ?bool $enabled = null,
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
            key: Coerce::toString($data['key'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            trigger: $data['trigger'] ?? null,
            metrics: Coerce::nullable($data['metrics'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
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
            'key' => $this->key,
            'name' => $this->name,
            'source' => $this->source,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->trigger !== null) {
            $payload['trigger'] = $this->trigger;
        }
        if ($this->metrics !== null) {
            $payload['metrics'] = $this->metrics;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
