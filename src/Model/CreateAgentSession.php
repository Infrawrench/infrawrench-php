<?php

/*
 * infrawrench/sdk v1.2.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.2.0).
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
    public function __construct(
        public readonly ?AgentSettings $settings,
        public readonly ?string $repo = null,
        public readonly ?string $projectName = null,
        public readonly ?string $workspaceName = null,
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

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
