<?php

/*
 * infrawrench/sdk v1.60.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.60.0).
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

final class GithubIssueSettingsInput implements \JsonSerializable
{
    /**
     * @param bool $enabled Master switch for filing, manual and routed.
     * @param list<string> $labels
     * @param list<string> $assignees
     * @param list<GithubIssueRouteInput> $routes Ordered; the first match wins and no match falls back to `defaultRepo`.
     * @param GithubResolveAction::* $resolveAction
     * @param bool $pullRequestsEnabled Allow holders of `github-issues:write` to open pull requests editing Terraform for IaC-managed findings. Never auto-merged.
     * @param list<GithubIacSourceInput> $iacSources
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
            routes: Coerce::mapList($data['routes'] ?? null, static fn (mixed $item): GithubIssueRouteInput => GithubIssueRouteInput::fromArray(Coerce::toArray($item))),
            resolveAction: Coerce::toString($data['resolveAction'] ?? null),
            pullRequestsEnabled: Coerce::toBool($data['pullRequestsEnabled'] ?? null),
            iacSources: Coerce::mapList($data['iacSources'] ?? null, static fn (mixed $item): GithubIacSourceInput => GithubIacSourceInput::fromArray(Coerce::toArray($item))),
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
            'routes' => array_map(static fn (GithubIssueRouteInput $item): array => $item->toArray(), $this->routes),
            'resolveAction' => $this->resolveAction,
            'pullRequestsEnabled' => $this->pullRequestsEnabled,
            'iacSources' => array_map(static fn (GithubIacSourceInput $item): array => $item->toArray(), $this->iacSources),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
