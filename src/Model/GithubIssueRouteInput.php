<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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

final class GithubIssueRouteInput implements \JsonSerializable
{
    /**
     * @param array{kind: 'cost_centre', costCentreId: string}|array{kind: 'tag', tagKey: string, tagValue: string|null} $match
     * @param list<string> $labels Added to the organization-wide labels.
     * @param list<string> $assignees Replace the organization-wide assignees when non-empty.
     */
    public function __construct(
        public readonly array $match,
        public readonly ?GithubRepoRef $repo,
        public readonly array $labels,
        public readonly array $assignees,
        public readonly ?string $id = null,
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
            match: $data['match'] ?? null,
            repo: Coerce::nullable($data['repo'] ?? null, static fn (mixed $value): GithubRepoRef => GithubRepoRef::fromArray(Coerce::toArray($value))),
            labels: Coerce::mapList($data['labels'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            assignees: Coerce::mapList($data['assignees'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            id: Coerce::toStringOrNull($data['id'] ?? null),
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
            'match' => $this->match,
            'repo' => $this->repo?->toArray(),
            'labels' => $this->labels,
            'assignees' => $this->assignees,
        ];
        if ($this->id !== null) {
            $payload['id'] = $this->id;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
