<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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
 * Terminal sessions only: work on this branch of one of the organization's repositories on
 * git.infrawrench.com, whose page is open. The session clones that repository, checks out the
 * branch, can push that branch and nothing else (a job token bound to the branch that lasts at
 * most 6 hours, renewed when the session is opened), starts the coding tool with the page's title
 * and description as its first prompt, and is recorded as the page's agent. `repo` is ignored.
 * Needs `git:write`. A branch page that is missing, closed, from a fork or not the organization's
 * is one refusal (400).
 */
final class AgentGitWork implements \JsonSerializable
{
    /**
     * @param string $owner The repository's namespace on the forge.
     * @param string $repo The repository's name on the forge.
     * @param string $branch The branch page's key: the branch's name (`work/fix-login`), or `<name>~<n>` for an earlier page of a name used again, as the forge writes it in the page's address.
     */
    public function __construct(
        public readonly string $owner,
        public readonly string $repo,
        public readonly string $branch,
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
            branch: Coerce::toString($data['branch'] ?? null),
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
            'branch' => $this->branch,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
