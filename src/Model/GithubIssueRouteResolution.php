<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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

final class GithubIssueRouteResolution implements \JsonSerializable
{
    /**
     * @param list<string> $labels
     * @param list<string> $assignees
     */
    public function __construct(
        public readonly ?GithubRepoRef $repo,
        public readonly array $labels,
        public readonly array $assignees,
        public readonly ?string $routeId,
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
            repo: Coerce::nullable($data['repo'] ?? null, static fn (mixed $value): GithubRepoRef => GithubRepoRef::fromArray(Coerce::toArray($value))),
            labels: Coerce::mapList($data['labels'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            assignees: Coerce::mapList($data['assignees'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            routeId: Coerce::toStringOrNull($data['routeId'] ?? null),
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
            'repo' => $this->repo?->toArray(),
            'labels' => $this->labels,
            'assignees' => $this->assignees,
            'routeId' => $this->routeId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
