<?php

/*
 * infrawrench/sdk v1.63.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.63.0).
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

final class FileGithubIssueResult implements \JsonSerializable
{
    /**
     * @param 'created'|'commented' $action `commented` when an open issue for the finding already existed.
     */
    public function __construct(
        public readonly string $action,
        public readonly GithubIssueLink $link,
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
            action: Coerce::toString($data['action'] ?? null),
            link: GithubIssueLink::fromArray(Coerce::toArray($data['link'] ?? null)),
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
            'action' => $this->action,
            'link' => $this->link->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
