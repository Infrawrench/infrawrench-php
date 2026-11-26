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

final class InfraenvCommitRequest implements \JsonSerializable
{
    /**
     * @param string $repo `owner/name`.
     * @param string $path Path of the file in the repository. Defaults to `.infraenv` in the editors.
     * @param string $content The `.infraenv` file's text.
     * @param string|null $sha The blob sha the file had when it was read, or null for a new file. A file changed since then answers 400 rather than being overwritten.
     * @param 'commit'|'pull-request' $mode Commit straight to the branch, or to a new branch with a pull request.
     * @param string|null $branch The branch to commit to, or to open the pull request against. Null means the default branch.
     */
    public function __construct(
        public readonly int $installationId,
        public readonly string $repo,
        public readonly string $path,
        public readonly string $content,
        public readonly ?string $sha,
        public readonly string $mode,
        public readonly ?string $branch = null,
        public readonly ?string $message = null,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            path: Coerce::toString($data['path'] ?? null),
            content: Coerce::toString($data['content'] ?? null),
            sha: Coerce::toStringOrNull($data['sha'] ?? null),
            mode: Coerce::toString($data['mode'] ?? null),
            branch: Coerce::toStringOrNull($data['branch'] ?? null),
            message: Coerce::toStringOrNull($data['message'] ?? null),
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
            'installationId' => $this->installationId,
            'repo' => $this->repo,
            'path' => $this->path,
            'content' => $this->content,
            'sha' => $this->sha,
            'mode' => $this->mode,
        ];
        if ($this->branch !== null) {
            $payload['branch'] = $this->branch;
        }
        if ($this->message !== null) {
            $payload['message'] = $this->message;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
