<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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

final class SyntheticProbe implements \JsonSerializable
{
    /**
     * @param string $url Absolute http(s) URL the check hits from the edge proxy.
     * @param string $method HTTP method the probe uses — GET, HEAD or OPTIONS. Unknown values become GET.
     * @param int $intervalSeconds Seconds between checks. Clamped server-side to 60–86400.
     * @param int $timeoutMs Per-check timeout in milliseconds. Clamped server-side to 1000–60000.
     * @param int $failureThreshold Consecutive failures before the probe flips to `down` and notifies. Clamped 1–20.
     * @param string|null $accountId Account of the linked resource, when the URL came from one.
     * @param string|null $resourceId Linked resource id; advisory, not a foreign key.
     * @param string|null $outputKey The resource output/field key the URL was suggested from.
     * @param 'up'|'down'|'unknown' $status The probe's state machine: `unknown` until the first result, `down` after `failureThreshold` consecutive failures, `up` on any success.
     * @param string|null $lastError Failure detail; null after a success.
     * @param string|null $lastStateChangeAt When status last flipped up/down.
     * @param float|null $uptime24h Fraction (0–1) of the trailing 24h the endpoint was up, from the recorded series; null before the first result lands in the metric store.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $url,
        public readonly string $method,
        public readonly int $intervalSeconds,
        public readonly int $timeoutMs,
        public readonly int $failureThreshold,
        public readonly bool $enabled,
        public readonly ?string $accountId,
        public readonly ?string $resourceId,
        public readonly mixed $pluginId,
        public readonly ?string $resourceTypeId,
        public readonly ?string $outputKey,
        public readonly string $status,
        public readonly int $consecutiveFailures,
        public readonly ?string $lastProbeAt,
        public readonly ?int $lastStatusCode,
        public readonly ?int $lastLatencyMs,
        public readonly ?string $lastError,
        public readonly ?string $lastStateChangeAt,
        public readonly ?float $uptime24h,
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
            name: Coerce::toString($data['name'] ?? null),
            url: Coerce::toString($data['url'] ?? null),
            method: Coerce::toString($data['method'] ?? null),
            intervalSeconds: Coerce::toInt($data['intervalSeconds'] ?? null),
            timeoutMs: Coerce::toInt($data['timeoutMs'] ?? null),
            failureThreshold: Coerce::toInt($data['failureThreshold'] ?? null),
            enabled: Coerce::toBool($data['enabled'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            pluginId: $data['pluginId'] ?? null,
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            outputKey: Coerce::toStringOrNull($data['outputKey'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            consecutiveFailures: Coerce::toInt($data['consecutiveFailures'] ?? null),
            lastProbeAt: Coerce::toStringOrNull($data['lastProbeAt'] ?? null),
            lastStatusCode: Coerce::toIntOrNull($data['lastStatusCode'] ?? null),
            lastLatencyMs: Coerce::toIntOrNull($data['lastLatencyMs'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            lastStateChangeAt: Coerce::toStringOrNull($data['lastStateChangeAt'] ?? null),
            uptime24h: Coerce::toFloatOrNull($data['uptime24h'] ?? null),
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
            'name' => $this->name,
            'url' => $this->url,
            'method' => $this->method,
            'intervalSeconds' => $this->intervalSeconds,
            'timeoutMs' => $this->timeoutMs,
            'failureThreshold' => $this->failureThreshold,
            'enabled' => $this->enabled,
            'accountId' => $this->accountId,
            'resourceId' => $this->resourceId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'outputKey' => $this->outputKey,
            'status' => $this->status,
            'consecutiveFailures' => $this->consecutiveFailures,
            'lastProbeAt' => $this->lastProbeAt,
            'lastStatusCode' => $this->lastStatusCode,
            'lastLatencyMs' => $this->lastLatencyMs,
            'lastError' => $this->lastError,
            'lastStateChangeAt' => $this->lastStateChangeAt,
            'uptime24h' => $this->uptime24h,
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
