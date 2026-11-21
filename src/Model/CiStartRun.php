<?php

/*
 * infrawrench/sdk v1.124.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.124.0).
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

final class CiStartRun implements \JsonSerializable
{
    /**
     * @param int $installationId The GitHub App installation of the account that runs CI for the repository.
     * @param string $repoFullName `owner/name`.
     * @param string $pipelineFile The pipeline to run, as `GET /ci/manual` lists it (`.infrawrench/ci/deploy.yml`).
     * @param string|null $branch A branch of the repository itself, whose head runs. The default branch when omitted.
     * @param array<string, string|bool|float>|null $inputs Values for the pipeline's `on.manual.inputs`, by name: a string, a boolean or a number each. Inputs left out read as their defaults.
     */
    public function __construct(
        public readonly int $installationId,
        public readonly string $repoFullName,
        public readonly string $pipelineFile,
        public readonly ?string $branch = null,
        public readonly ?array $inputs = null,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            repoFullName: Coerce::toString($data['repoFullName'] ?? null),
            pipelineFile: Coerce::toString($data['pipelineFile'] ?? null),
            branch: Coerce::toStringOrNull($data['branch'] ?? null),
            inputs: Coerce::toArrayOrNull($data['inputs'] ?? null),
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
            'installationId' => $this->installationId,
            'repoFullName' => $this->repoFullName,
            'pipelineFile' => $this->pipelineFile,
        ];
        if ($this->branch !== null) {
            $payload['branch'] = $this->branch;
        }
        if ($this->inputs !== null) {
            $payload['inputs'] = $this->inputs;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
