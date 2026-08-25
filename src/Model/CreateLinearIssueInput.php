<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class CreateLinearIssueInput implements \JsonSerializable
{
    /**
     * @param LinearSourceKind::* $sourceKind
     * @param string $sourceId The finding's own id, as the detector reports it.
     * @param string $teamId Team to file into. Every Linear issue belongs to exactly one team.
     * @param string|null $description Markdown, passed to Linear as-is — unlike Jira, where the server converts plain text to Atlassian Document Format.
     * @param list<string>|null $labelIds Ids of existing labels in the workspace. Linear cannot create labels here.
     * @param string|null $projectId Optional project to attach the issue to.
     */
    public function __construct(
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly string $teamId,
        public readonly string $title,
        public readonly ?string $description = null,
        public readonly ?array $labelIds = null,
        public readonly ?string $projectId = null,
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
            sourceKind: Coerce::toString($data['sourceKind'] ?? null),
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            teamId: Coerce::toString($data['teamId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            labelIds: Coerce::nullable($data['labelIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            projectId: Coerce::toStringOrNull($data['projectId'] ?? null),
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
            'sourceKind' => $this->sourceKind,
            'sourceId' => $this->sourceId,
            'teamId' => $this->teamId,
            'title' => $this->title,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->labelIds !== null) {
            $payload['labelIds'] = $this->labelIds;
        }
        if ($this->projectId !== null) {
            $payload['projectId'] = $this->projectId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
