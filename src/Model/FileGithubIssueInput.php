<?php

/*
 * infrawrench/sdk v1.68.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.68.0).
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

final class FileGithubIssueInput implements \JsonSerializable
{
    /**
     * @param GithubIssueSourceKind::* $sourceKind
     * @param list<array{label: string, value?: string|float|null}>|null $details
     * @param array{amount: float, currency: string}|null $monthlyCost
     * @param list<string>|null $remediation Shell commands that fix the finding, rendered as a code block to review.
     * @param list<string>|null $labels
     * @param list<string>|null $assignees
     */
    public function __construct(
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly string $title,
        public readonly ?array $details = null,
        public readonly ?string $note = null,
        public readonly ?string $resourceId = null,
        public readonly ?array $monthlyCost = null,
        public readonly ?array $remediation = null,
        public readonly ?GithubRepoRef $repo = null,
        public readonly ?array $labels = null,
        public readonly ?array $assignees = null,
        public readonly ?string $appUrl = null,
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
            title: Coerce::toString($data['title'] ?? null),
            details: Coerce::nullable($data['details'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): array => Coerce::toArray($item))),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            monthlyCost: Coerce::toArrayOrNull($data['monthlyCost'] ?? null),
            remediation: Coerce::nullable($data['remediation'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            repo: Coerce::nullable($data['repo'] ?? null, static fn (mixed $value): GithubRepoRef => GithubRepoRef::fromArray(Coerce::toArray($value))),
            labels: Coerce::nullable($data['labels'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            assignees: Coerce::nullable($data['assignees'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            appUrl: Coerce::toStringOrNull($data['appUrl'] ?? null),
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
            'title' => $this->title,
        ];
        if ($this->details !== null) {
            $payload['details'] = $this->details;
        }
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->monthlyCost !== null) {
            $payload['monthlyCost'] = $this->monthlyCost;
        }
        if ($this->remediation !== null) {
            $payload['remediation'] = $this->remediation;
        }
        if ($this->repo !== null) {
            $payload['repo'] = $this->repo?->toArray();
        }
        if ($this->labels !== null) {
            $payload['labels'] = $this->labels;
        }
        if ($this->assignees !== null) {
            $payload['assignees'] = $this->assignees;
        }
        if ($this->appUrl !== null) {
            $payload['appUrl'] = $this->appUrl;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
