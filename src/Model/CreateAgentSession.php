<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class CreateAgentSession implements \JsonSerializable
{
    /**
     * @param array{scopes: list<string>}|null $nibbletsLink Nibblets sessions only: start the server linked to this organization through an agent link you approve, as on the link approval page. Needs `team:invite`; `scopes` must be within what you hold (no break-glass elevation) minus permissions no agent may hold. Refused for API keys and agents.
     */
    public function __construct(
        public readonly ?AgentSettings $settings,
        public readonly ?string $repo = null,
        public readonly ?string $projectName = null,
        public readonly ?string $workspaceName = null,
        public readonly ?array $nibbletsLink = null,
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
            settings: Coerce::nullable($data['settings'] ?? null, static fn (mixed $value): AgentSettings => AgentSettings::fromArray(Coerce::toArray($value))),
            repo: Coerce::toStringOrNull($data['repo'] ?? null),
            projectName: Coerce::toStringOrNull($data['projectName'] ?? null),
            workspaceName: Coerce::toStringOrNull($data['workspaceName'] ?? null),
            nibbletsLink: Coerce::toArrayOrNull($data['nibbletsLink'] ?? null),
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
            'settings' => $this->settings?->toArray(),
        ];
        if ($this->repo !== null) {
            $payload['repo'] = $this->repo;
        }
        if ($this->projectName !== null) {
            $payload['projectName'] = $this->projectName;
        }
        if ($this->workspaceName !== null) {
            $payload['workspaceName'] = $this->workspaceName;
        }
        if ($this->nibbletsLink !== null) {
            $payload['nibbletsLink'] = $this->nibbletsLink;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
