<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class QueryMonitorCreate implements \JsonSerializable
{
    /**
     * @param 'scalar'|'rowCount' $mode How the result is reduced to one number. `scalar` reads the first column of the first row; `rowCount` counts the rows, which is what lets `SELECT … WHERE broken` be a monitor.
     * @param 'gt'|'gte'|'lt'|'lte'|'eq'|'neq' $operator
     */
    public function __construct(
        public readonly string $name,
        public readonly string $accountId,
        public readonly string $sql,
        public readonly string $mode,
        public readonly string $operator,
        public readonly float $threshold,
        public readonly int $intervalMinutes,
        public readonly ?string $description = null,
        public readonly ?string $resourceId = null,
        public readonly ?string $resourceTypeId = null,
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
            name: Coerce::toString($data['name'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            sql: Coerce::toString($data['sql'] ?? null),
            mode: Coerce::toString($data['mode'] ?? null),
            operator: Coerce::toString($data['operator'] ?? null),
            threshold: Coerce::toFloat($data['threshold'] ?? null),
            intervalMinutes: Coerce::toInt($data['intervalMinutes'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
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
            'name' => $this->name,
            'accountId' => $this->accountId,
            'sql' => $this->sql,
            'mode' => $this->mode,
            'operator' => $this->operator,
            'threshold' => $this->threshold,
            'intervalMinutes' => $this->intervalMinutes,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
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
