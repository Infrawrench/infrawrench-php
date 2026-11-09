<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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

final class Workflow implements \JsonSerializable
{
    /**
     * @param string $organizationId Organization id
     * @param string $source The workflow's TypeScript source.
     * @param array{kind: 'manual'}|array{kind: 'cron', expression: string, timezone?: string}|array{kind: 'git', provider?: string, repo?: string, branch?: string, events?: list<string>, installationId?: int}|array{kind: 'budget', budgetId: string, percent?: float, metric?: 'actual'|'forecast'} $trigger
     * @param list<WorkflowMetricDef> $metricDefs
     * @param string|null $webhookToken The token in a git trigger's webhook URL; null for other triggers.
     * @param bool $hasWebhookSecret Whether a git webhook signing secret is set. The secret itself is never returned.
     * @param string|null $gitLastSha The last commit a git trigger's repository watcher saw.
     * @param string|null $budgetLastFiredKey The budget crossing that last fired a budget trigger, so each fires once a period.
     * @param string|null $nextRunAt The next fire time of a cron trigger.
     * @param string|null $sourceAuthorUserId Who automated runs act for: the user who last changed the source, trigger or assigned secrets.
     * @param string|null $deletedAt Always null: deleted workflows are not listed.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $source,
        public readonly array $trigger,
        public readonly array $metricDefs,
        public readonly bool $enabled,
        public readonly ?string $webhookToken,
        public readonly bool $hasWebhookSecret,
        public readonly ?string $gitLastSha,
        public readonly ?string $budgetLastFiredKey,
        public readonly ?string $nextRunAt,
        public readonly ?string $lastRunAt,
        public readonly ?string $createdByUserId,
        public readonly ?string $sourceAuthorUserId,
        public readonly int $syncVersion,
        public readonly ?string $deletedAt,
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
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            trigger: $data['trigger'] ?? null,
            metricDefs: Coerce::mapList($data['metricDefs'] ?? null, static fn (mixed $item): WorkflowMetricDef => WorkflowMetricDef::fromArray(Coerce::toArray($item))),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            webhookToken: Coerce::toStringOrNull($data['webhookToken'] ?? null),
            hasWebhookSecret: Coerce::toBool($data['hasWebhookSecret'] ?? null),
            gitLastSha: Coerce::toStringOrNull($data['gitLastSha'] ?? null),
            budgetLastFiredKey: Coerce::toStringOrNull($data['budgetLastFiredKey'] ?? null),
            nextRunAt: Coerce::toStringOrNull($data['nextRunAt'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            sourceAuthorUserId: Coerce::toStringOrNull($data['sourceAuthorUserId'] ?? null),
            syncVersion: Coerce::toInt($data['syncVersion'] ?? null),
            deletedAt: Coerce::toStringOrNull($data['deletedAt'] ?? null),
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
            'organizationId' => $this->organizationId,
            'name' => $this->name,
            'description' => $this->description,
            'source' => $this->source,
            'trigger' => $this->trigger,
            'metricDefs' => array_map(static fn (WorkflowMetricDef $item): array => $item->toArray(), $this->metricDefs),
            'enabled' => $this->enabled,
            'webhookToken' => $this->webhookToken,
            'hasWebhookSecret' => $this->hasWebhookSecret,
            'gitLastSha' => $this->gitLastSha,
            'budgetLastFiredKey' => $this->budgetLastFiredKey,
            'nextRunAt' => $this->nextRunAt,
            'lastRunAt' => $this->lastRunAt,
            'createdByUserId' => $this->createdByUserId,
            'sourceAuthorUserId' => $this->sourceAuthorUserId,
            'syncVersion' => $this->syncVersion,
            'deletedAt' => $this->deletedAt,
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
