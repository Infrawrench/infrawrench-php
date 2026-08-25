<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class QueryMonitorUpdate implements \JsonSerializable
{
    /**
     * @param 'scalar'|'rowCount'|null $mode How the result is reduced to one number. `scalar` reads the first column of the first row; `rowCount` counts the rows, which is what lets `SELECT … WHERE broken` be a monitor.
     * @param 'gt'|'gte'|'lt'|'lte'|'eq'|'neq'|null $operator
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $description = null,
        public readonly ?string $accountId = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $resourceTypeId = null,
        public readonly ?string $sql = null,
        public readonly ?string $mode = null,
        public readonly ?string $operator = null,
        public readonly ?float $threshold = null,
        public readonly ?int $intervalMinutes = null,
        public readonly ?int $consecutiveBreaches = null,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            sql: Coerce::toStringOrNull($data['sql'] ?? null),
            mode: Coerce::toStringOrNull($data['mode'] ?? null),
            operator: Coerce::toStringOrNull($data['operator'] ?? null),
            threshold: Coerce::toFloatOrNull($data['threshold'] ?? null),
            intervalMinutes: Coerce::toIntOrNull($data['intervalMinutes'] ?? null),
            consecutiveBreaches: Coerce::toIntOrNull($data['consecutiveBreaches'] ?? null),
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
        ];
        if ($this->name !== null) {
            $payload['name'] = $this->name;
        }
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
        }
        if ($this->sql !== null) {
            $payload['sql'] = $this->sql;
        }
        if ($this->mode !== null) {
            $payload['mode'] = $this->mode;
        }
        if ($this->operator !== null) {
            $payload['operator'] = $this->operator;
        }
        if ($this->threshold !== null) {
            $payload['threshold'] = $this->threshold;
        }
        if ($this->intervalMinutes !== null) {
            $payload['intervalMinutes'] = $this->intervalMinutes;
        }
        if ($this->consecutiveBreaches !== null) {
            $payload['consecutiveBreaches'] = $this->consecutiveBreaches;
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
