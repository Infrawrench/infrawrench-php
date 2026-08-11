<?php

/*
 * infrawrench/sdk v1.10.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.10.0).
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

final class WorkflowApproval implements \JsonSerializable
{
    /** @param WorkflowApprovalStatus::* $status */
    public function __construct(
        public readonly string $id,
        public readonly string $workflowId,
        public readonly ?string $workflowName,
        public readonly string $runId,
        public readonly string $title,
        public readonly string $message,
        public readonly string $status,
        public readonly string $expiresAt,
        public readonly ?string $decidedAt,
        public readonly ?string $decidedByName,
        public readonly string $createdAt,
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
            workflowId: Coerce::toString($data['workflowId'] ?? null),
            workflowName: Coerce::toStringOrNull($data['workflowName'] ?? null),
            runId: Coerce::toString($data['runId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            message: Coerce::toString($data['message'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            decidedAt: Coerce::toStringOrNull($data['decidedAt'] ?? null),
            decidedByName: Coerce::toStringOrNull($data['decidedByName'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'workflowId' => $this->workflowId,
            'workflowName' => $this->workflowName,
            'runId' => $this->runId,
            'title' => $this->title,
            'message' => $this->message,
            'status' => $this->status,
            'expiresAt' => $this->expiresAt,
            'decidedAt' => $this->decidedAt,
            'decidedByName' => $this->decidedByName,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
