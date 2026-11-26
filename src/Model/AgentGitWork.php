<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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

/**
 * Terminal sessions only: work on this open pull request of one of the organization's repositories
 * on git.infrawrench.com. The session clones that repository, checks out the pull request's head
 * branch, can push that branch and nothing else (a job token bound to the branch that lasts at
 * most 6 hours, renewed when the session is opened), starts the coding tool with the pull
 * request's title and body as its first prompt, and is recorded as the pull request's agent.
 * `repo` is ignored. Needs `git:write`. A pull request that is missing, closed, from a fork or not
 * the organization's is one refusal (400).
 */
final class AgentGitWork implements \JsonSerializable
{
    /**
     * @param string $owner The repository's namespace on the forge.
     * @param string $repo The repository's name on the forge.
     * @param int $pull The pull request's number.
     */
    public function __construct(
        public readonly string $owner,
        public readonly string $repo,
        public readonly int $pull,
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
            owner: Coerce::toString($data['owner'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            pull: Coerce::toInt($data['pull'] ?? null),
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
            'owner' => $this->owner,
            'repo' => $this->repo,
            'pull' => $this->pull,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
