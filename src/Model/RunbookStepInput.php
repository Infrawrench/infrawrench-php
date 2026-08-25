<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class RunbookStepInput implements \JsonSerializable
{
    /**
     * @param 'manual'|'workflow'|'link' $kind What the step does. Three kinds and not a scripting language: a runbook is written by whoever is on call for whoever is on call next, and the moment it needs a language it stops being written. `workflow` is the escape hatch — anything genuinely automated belongs in a workflow, which already has a sandbox, approvals, secrets and a history.
     * @param string|null $id Omitted for a new step; the server assigns one.
     */
    public function __construct(
        public readonly string $kind,
        public readonly string $title,
        public readonly ?string $id = null,
        public readonly ?string $body = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            id: Coerce::toStringOrNull($data['id'] ?? null),
            body: Coerce::toStringOrNull($data['body'] ?? null),
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
            'kind' => $this->kind,
            'title' => $this->title,
        ];
        if ($this->id !== null) {
            $payload['id'] = $this->id;
        }
        if ($this->body !== null) {
            $payload['body'] = $this->body;
        }
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
