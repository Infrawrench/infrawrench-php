<?php

/*
 * infrawrench/sdk v1.99.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.99.0).
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

final class WorkflowInput implements \JsonSerializable
{
    /**
     * @param string|null $name Trimmed. Omitted or blank: `Untitled workflow` on create, unchanged on update.
     * @param array{kind: 'manual'}|array{kind: 'cron', expression: string, timezone?: string}|array{kind: 'git', provider?: string, repo?: string, branch?: string, events?: list<string>, installationId?: int}|array{kind: 'budget', budgetId: string, percent?: float, metric?: 'actual'|'forecast'}|null $trigger
     * @param list<WorkflowMetricDef>|null $metrics
     * @param list<string>|null $secretIds Replaces the organization secrets assigned to the workflow. Needs `secrets:read`.
     * @param string|null $webhookSecret Sets or rotates the git webhook signing secret; null or empty clears it. Write-only.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $description = null,
        public readonly ?string $source = null,
        public readonly ?array $trigger = null,
        public readonly ?array $metrics = null,
        public readonly ?bool $enabled = null,
        public readonly ?array $secretIds = null,
        public readonly ?string $webhookSecret = null,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            source: Coerce::toStringOrNull($data['source'] ?? null),
            trigger: $data['trigger'] ?? null,
            metrics: Coerce::nullable($data['metrics'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): WorkflowMetricDef => WorkflowMetricDef::fromArray(Coerce::toArray($item)))),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            secretIds: Coerce::nullable($data['secretIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            webhookSecret: Coerce::toStringOrNull($data['webhookSecret'] ?? null),
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
        if ($this->name !== null) {
            $payload['name'] = $this->name;
        }
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->source !== null) {
            $payload['source'] = $this->source;
        }
        if ($this->trigger !== null) {
            $payload['trigger'] = $this->trigger;
        }
        if ($this->metrics !== null) {
            $payload['metrics'] = array_map(static fn (WorkflowMetricDef $item): array => $item->toArray(), $this->metrics);
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }
        if ($this->secretIds !== null) {
            $payload['secretIds'] = $this->secretIds;
        }
        if ($this->webhookSecret !== null) {
            $payload['webhookSecret'] = $this->webhookSecret;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
