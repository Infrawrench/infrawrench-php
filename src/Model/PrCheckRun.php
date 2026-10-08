<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PrCheckRun implements \JsonSerializable
{
    /**
     * @param 'running'|'completed'|'failed' $status
     * @param PrCheckConclusion::* $conclusion
     */
    public function __construct(
        public readonly string $id,
        public readonly string $repositoryId,
        public readonly string $repo,
        public readonly int $pullNumber,
        public readonly ?string $pullTitle,
        public readonly ?string $pullUrl,
        public readonly string $headSha,
        public readonly string $status,
        public readonly string $conclusion,
        public readonly ?string $checkRunUrl,
        public readonly ?string $commentUrl,
        public readonly ?PrCheckReport $report,
        public readonly ?string $error,
        public readonly string $createdAt,
        public readonly ?string $completedAt,
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
            repositoryId: Coerce::toString($data['repositoryId'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            pullNumber: Coerce::toInt($data['pullNumber'] ?? null),
            pullTitle: Coerce::toStringOrNull($data['pullTitle'] ?? null),
            pullUrl: Coerce::toStringOrNull($data['pullUrl'] ?? null),
            headSha: Coerce::toString($data['headSha'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            conclusion: Coerce::toString($data['conclusion'] ?? null),
            checkRunUrl: Coerce::toStringOrNull($data['checkRunUrl'] ?? null),
            commentUrl: Coerce::toStringOrNull($data['commentUrl'] ?? null),
            report: Coerce::nullable($data['report'] ?? null, static fn (mixed $value): PrCheckReport => PrCheckReport::fromArray(Coerce::toArray($value))),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            completedAt: Coerce::toStringOrNull($data['completedAt'] ?? null),
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
            'repositoryId' => $this->repositoryId,
            'repo' => $this->repo,
            'pullNumber' => $this->pullNumber,
            'pullTitle' => $this->pullTitle,
            'pullUrl' => $this->pullUrl,
            'headSha' => $this->headSha,
            'status' => $this->status,
            'conclusion' => $this->conclusion,
            'checkRunUrl' => $this->checkRunUrl,
            'commentUrl' => $this->commentUrl,
            'report' => $this->report?->toArray(),
            'error' => $this->error,
            'createdAt' => $this->createdAt,
            'completedAt' => $this->completedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
