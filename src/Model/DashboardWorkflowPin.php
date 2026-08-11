<?php

/*
 * infrawrench/sdk v1.12.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.12.0).
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

final class DashboardWorkflowPin implements \JsonSerializable
{
    /**
     * @param list<array{key: string, label: string, unit: string|null, value?: mixed}> $metrics
     */
    public function __construct(
        public readonly string $pinId,
        public readonly string $workflowId,
        public readonly int $gridX,
        public readonly string $name,
        public readonly ?string $lastRunAt,
        public readonly ?string $lastStatus,
        public readonly array $metrics,
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
            pinId: Coerce::toString($data['pinId'] ?? null),
            workflowId: Coerce::toString($data['workflowId'] ?? null),
            gridX: Coerce::toInt($data['gridX'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            lastRunAt: Coerce::toStringOrNull($data['lastRunAt'] ?? null),
            lastStatus: Coerce::toStringOrNull($data['lastStatus'] ?? null),
            metrics: Coerce::mapList($data['metrics'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'pinId' => $this->pinId,
            'workflowId' => $this->workflowId,
            'gridX' => $this->gridX,
            'name' => $this->name,
            'lastRunAt' => $this->lastRunAt,
            'lastStatus' => $this->lastStatus,
            'metrics' => $this->metrics,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
