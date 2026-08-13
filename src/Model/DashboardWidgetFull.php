<?php

/*
 * infrawrench/sdk v1.23.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.23.0).
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

final class DashboardWidgetFull implements \JsonSerializable
{
    /**
     * @param DashboardWidgetKind::* $kind
     * @param array<string, mixed> $config
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $dashboardId,
        public readonly string $kind,
        public readonly string $title,
        public readonly array $config,
        public readonly int $gridX,
        public readonly int $gridY,
        public readonly int $gridW,
        public readonly int $gridH,
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
            dashboardId: Coerce::toString($data['dashboardId'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            config: Coerce::toArray($data['config'] ?? null),
            gridX: Coerce::toInt($data['gridX'] ?? null),
            gridY: Coerce::toInt($data['gridY'] ?? null),
            gridW: Coerce::toInt($data['gridW'] ?? null),
            gridH: Coerce::toInt($data['gridH'] ?? null),
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
            'dashboardId' => $this->dashboardId,
            'kind' => $this->kind,
            'title' => $this->title,
            'config' => $this->config,
            'gridX' => $this->gridX,
            'gridY' => $this->gridY,
            'gridW' => $this->gridW,
            'gridH' => $this->gridH,
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
