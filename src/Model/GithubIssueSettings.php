<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class GithubIssueSettings implements \JsonSerializable
{
    /**
     * @param list<string> $labels
     * @param list<string> $assignees
     * @param list<GithubIssueRoute> $routes
     * @param GithubResolveAction::* $resolveAction
     * @param list<GithubIacSource> $iacSources
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly ?GithubRepoRef $defaultRepo,
        public readonly array $labels,
        public readonly array $assignees,
        public readonly array $routes,
        public readonly string $resolveAction,
        public readonly bool $pullRequestsEnabled,
        public readonly array $iacSources,
        public readonly ?string $updatedAt,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            defaultRepo: Coerce::nullable($data['defaultRepo'] ?? null, static fn (mixed $value): GithubRepoRef => GithubRepoRef::fromArray(Coerce::toArray($value))),
            labels: Coerce::mapList($data['labels'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            assignees: Coerce::mapList($data['assignees'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            routes: Coerce::mapList($data['routes'] ?? null, static fn (mixed $item): GithubIssueRoute => GithubIssueRoute::fromArray(Coerce::toArray($item))),
            resolveAction: Coerce::toString($data['resolveAction'] ?? null),
            pullRequestsEnabled: Coerce::toBool($data['pullRequestsEnabled'] ?? null),
            iacSources: Coerce::mapList($data['iacSources'] ?? null, static fn (mixed $item): GithubIacSource => GithubIacSource::fromArray(Coerce::toArray($item))),
            updatedAt: Coerce::toStringOrNull($data['updatedAt'] ?? null),
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
            'enabled' => $this->enabled,
            'defaultRepo' => $this->defaultRepo?->toArray(),
            'labels' => $this->labels,
            'assignees' => $this->assignees,
            'routes' => array_map(static fn (GithubIssueRoute $item): array => $item->toArray(), $this->routes),
            'resolveAction' => $this->resolveAction,
            'pullRequestsEnabled' => $this->pullRequestsEnabled,
            'iacSources' => array_map(static fn (GithubIacSource $item): array => $item->toArray(), $this->iacSources),
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
