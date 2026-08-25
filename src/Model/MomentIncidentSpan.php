<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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
 * A provider incident whose span overlaps the window — returned alongside the events so clients
 * can badge events that fall inside it ("during DigitalOcean incident").
 */
final class MomentIncidentSpan implements \JsonSerializable
{
    /** @param 'maintenance'|'minor'|'major'|'critical' $impact */
    public function __construct(
        public readonly string $id,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $title,
        public readonly string $impact,
        public readonly string $startedAt,
        public readonly ?string $resolvedAt = null,
        public readonly ?string $url = null,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            impact: Coerce::toString($data['impact'] ?? null),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
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
            'id' => $this->id,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'title' => $this->title,
            'impact' => $this->impact,
            'startedAt' => $this->startedAt,
        ];
        if ($this->resolvedAt !== null) {
            $payload['resolvedAt'] = $this->resolvedAt;
        }
        if ($this->url !== null) {
            $payload['url'] = $this->url;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
