<?php

/*
 * infrawrench/sdk v1.13.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.13.0).
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

final class CreateJiraIssueInput implements \JsonSerializable
{
    /**
     * @param JiraSourceKind::* $sourceKind
     * @param string $sourceId The finding's own id, as the detector reports it.
     * @param string|null $description Plain text. Converted server-side to Atlassian Document Format, which is what the Jira REST v3 description field requires; blank lines become paragraphs.
     * @param list<string>|null $labels Whitespace inside a label is replaced with '-', since Jira rejects it.
     */
    public function __construct(
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly string $projectKey,
        public readonly string $issueTypeId,
        public readonly string $summary,
        public readonly ?string $description = null,
        public readonly ?array $labels = null,
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
            projectKey: Coerce::toString($data['projectKey'] ?? null),
            issueTypeId: Coerce::toString($data['issueTypeId'] ?? null),
            summary: Coerce::toString($data['summary'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            labels: Coerce::nullable($data['labels'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'projectKey' => $this->projectKey,
            'issueTypeId' => $this->issueTypeId,
            'summary' => $this->summary,
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->labels !== null) {
            $payload['labels'] = $this->labels;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
