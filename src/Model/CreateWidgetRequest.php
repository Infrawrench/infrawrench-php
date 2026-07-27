<?php

/*
 * infrawrench/sdk v0.8.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.8.0).
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

final class CreateWidgetRequest implements \JsonSerializable
{
    /**
     * @param DashboardWidgetKind::* $kind
     * @param array<string, mixed> $config
     */
    public function __construct(
        public readonly string $dashboardId,
        public readonly string $kind,
        public readonly array $config,
        public readonly ?string $title = null,
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
            dashboardId: Coerce::toString($data['dashboardId'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            config: Coerce::toArray($data['config'] ?? null),
            title: Coerce::toStringOrNull($data['title'] ?? null),
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
            'dashboardId' => $this->dashboardId,
            'kind' => $this->kind,
            'config' => $this->config,
        ];
        if ($this->title !== null) {
            $payload['title'] = $this->title;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
