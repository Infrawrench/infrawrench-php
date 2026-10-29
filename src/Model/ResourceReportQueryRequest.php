<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class ResourceReportQueryRequest implements \JsonSerializable
{
    public function __construct(
        public readonly ResourceReportConfig $config,
        public readonly ?int $offset = null,
        public readonly ?int $limit = null,
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
            config: ResourceReportConfig::fromArray(Coerce::toArray($data['config'] ?? null)),
            offset: Coerce::toIntOrNull($data['offset'] ?? null),
            limit: Coerce::toIntOrNull($data['limit'] ?? null),
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
            'config' => $this->config->toArray(),
        ];
        if ($this->offset !== null) {
            $payload['offset'] = $this->offset;
        }
        if ($this->limit !== null) {
            $payload['limit'] = $this->limit;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
