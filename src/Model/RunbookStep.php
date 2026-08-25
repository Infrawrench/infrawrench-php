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

final class RunbookStep implements \JsonSerializable
{
    /**
     * @param string $id Stable across edits, because a run's per-step records reference it. Reordering or retitling keeps the same step; deleting one orphans its history, which is why runs keep the title they saw.
     * @param 'manual'|'workflow'|'link' $kind What the step does. Three kinds and not a scripting language: a runbook is written by whoever is on call for whoever is on call next, and the moment it needs a language it stops being written. `workflow` is the escape hatch — anything genuinely automated belongs in a workflow, which already has a sandbox, approvals, secrets and a history.
     * @param string $body Markdown — the detail nobody remembers at 03:00.
     * @param string|null $workflowId For `workflow` steps: which workflow the button runs.
     * @param string|null $url For `link` steps. `https:` only.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $title,
        public readonly string $body,
        public readonly ?string $workflowId = null,
        public readonly ?string $url = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            body: Coerce::toString($data['body'] ?? null),
            workflowId: Coerce::toStringOrNull($data['workflowId'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
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
            'id' => $this->id,
            'kind' => $this->kind,
            'title' => $this->title,
            'body' => $this->body,
        ];
        if ($this->workflowId !== null) {
            $payload['workflowId'] = $this->workflowId;
        }
        if ($this->url !== null) {
            $payload['url'] = $this->url;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
