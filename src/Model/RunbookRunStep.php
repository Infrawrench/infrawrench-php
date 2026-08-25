<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class RunbookRunStep implements \JsonSerializable
{
    /**
     * @param string $title The step's title **when the run started**. Copied rather than joined: a runbook is edited between incidents, and a postmortem showing today's wording against last month's run is not stale, it is quietly wrong.
     * @param 'manual'|'workflow'|'link' $kind What the step does. Three kinds and not a scripting language: a runbook is written by whoever is on call for whoever is on call next, and the moment it needs a language it stops being written. `workflow` is the escape hatch — anything genuinely automated belongs in a workflow, which already has a sandbox, approvals, secrets and a history.
     * @param 'pending'|'done'|'skipped'|'failed' $status
     * @param string|null $note What the responder typed — output, or why it was skipped.
     * @param string|null $workflowRunId The workflow run this step kicked off. Recorded here; the run itself goes through the workflow routes with their own permission, approvals and secrets.
     */
    public function __construct(
        public readonly string $stepId,
        public readonly string $title,
        public readonly string $kind,
        public readonly string $status,
        public readonly ?string $note,
        public readonly ?string $workflowRunId,
        public readonly ?string $actorUserId,
        public readonly ?string $actorName,
        public readonly ?string $updatedAt,
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
            stepId: Coerce::toString($data['stepId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            workflowRunId: Coerce::toStringOrNull($data['workflowRunId'] ?? null),
            actorUserId: Coerce::toStringOrNull($data['actorUserId'] ?? null),
            actorName: Coerce::toStringOrNull($data['actorName'] ?? null),
            updatedAt: Coerce::toStringOrNull($data['updatedAt'] ?? null),
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
            'stepId' => $this->stepId,
            'title' => $this->title,
            'kind' => $this->kind,
            'status' => $this->status,
            'note' => $this->note,
            'workflowRunId' => $this->workflowRunId,
            'actorUserId' => $this->actorUserId,
            'actorName' => $this->actorName,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
