<?php

/*
 * infrawrench/sdk v0.32.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.32.0).
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

final class LogWorkspaceQuery implements \JsonSerializable
{
    /**
     * @param list<LogStreamSelector> $resources
     * @param string $search The search expression. Empty matches every line; `/pattern/` (optionally `/pattern/i`) is a regular expression; otherwise whitespace-separated terms that must ALL appear in a line (case-insensitive), with `"quoted phrases"` and `-term` negation.
     * @param bool $alertEnabled When true the poller periodically evaluates the query and alerts on match.
     * @param string|null $lastEvalAt Last time the alert pass evaluated this query; null until it has run.
     * @param string|null $lastMatchAt Last evaluation that found at least one matching line.
     * @param string|null $lastAlertedAt Last dispatched notification — the cooldown anchor.
     * @param string|null $lastEvalError Failure detail from the last evaluation.
     * @param string|null $lastMatchSample Truncated sample of the most recent matching line.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $resources,
        public readonly string $search,
        public readonly bool $alertEnabled,
        public readonly ?string $lastEvalAt,
        public readonly ?string $lastMatchAt,
        public readonly ?string $lastAlertedAt,
        public readonly ?string $lastEvalError,
        public readonly ?string $lastMatchSample,
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
            resources: Coerce::mapList($data['resources'] ?? null, static fn (mixed $item): LogStreamSelector => LogStreamSelector::fromArray(Coerce::toArray($item))),
            search: Coerce::toString($data['search'] ?? null),
            alertEnabled: Coerce::toBool($data['alertEnabled'] ?? null),
            lastEvalAt: Coerce::toStringOrNull($data['lastEvalAt'] ?? null),
            lastMatchAt: Coerce::toStringOrNull($data['lastMatchAt'] ?? null),
            lastAlertedAt: Coerce::toStringOrNull($data['lastAlertedAt'] ?? null),
            lastEvalError: Coerce::toStringOrNull($data['lastEvalError'] ?? null),
            lastMatchSample: Coerce::toStringOrNull($data['lastMatchSample'] ?? null),
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
            'resources' => array_map(static fn (LogStreamSelector $item): array => $item->toArray(), $this->resources),
            'search' => $this->search,
            'alertEnabled' => $this->alertEnabled,
            'lastEvalAt' => $this->lastEvalAt,
            'lastMatchAt' => $this->lastMatchAt,
            'lastAlertedAt' => $this->lastAlertedAt,
            'lastEvalError' => $this->lastEvalError,
            'lastMatchSample' => $this->lastMatchSample,
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
