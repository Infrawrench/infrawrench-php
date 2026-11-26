<?php

/*
 * infrawrench/sdk v1.132.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.132.0).
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

final class GitForgeRepository implements \JsonSerializable
{
    /**
     * @param string $fullName `namespace/name`.
     * @param string $url The repository's page on the forge.
     * @param GitForgeVisibility::* $visibility
     * @param string|null $pushedAt Null until something is pushed.
     * @param array{status: string, runId: string, sha: string}|null $ci The latest CI run of the default branch. Null when CI has not run there.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $fullName,
        public readonly string $url,
        public readonly ?string $description,
        public readonly string $visibility,
        public readonly bool $archived,
        public readonly bool $isFork,
        public readonly string $defaultBranch,
        public readonly ?string $pushedAt,
        public readonly int $openPullRequests,
        public readonly int $openIssues,
        public readonly float $sizeBytes,
        public readonly ?array $ci,
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
            fullName: Coerce::toString($data['fullName'] ?? null),
            url: Coerce::toString($data['url'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            visibility: Coerce::toString($data['visibility'] ?? null),
            archived: Coerce::toBool($data['archived'] ?? null),
            isFork: Coerce::toBool($data['isFork'] ?? null),
            defaultBranch: Coerce::toString($data['defaultBranch'] ?? null),
            pushedAt: Coerce::toStringOrNull($data['pushedAt'] ?? null),
            openPullRequests: Coerce::toInt($data['openPullRequests'] ?? null),
            openIssues: Coerce::toInt($data['openIssues'] ?? null),
            sizeBytes: Coerce::toFloat($data['sizeBytes'] ?? null),
            ci: Coerce::toArrayOrNull($data['ci'] ?? null),
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
            'fullName' => $this->fullName,
            'url' => $this->url,
            'description' => $this->description,
            'visibility' => $this->visibility,
            'archived' => $this->archived,
            'isFork' => $this->isFork,
            'defaultBranch' => $this->defaultBranch,
            'pushedAt' => $this->pushedAt,
            'openPullRequests' => $this->openPullRequests,
            'openIssues' => $this->openIssues,
            'sizeBytes' => $this->sizeBytes,
            'ci' => $this->ci,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
