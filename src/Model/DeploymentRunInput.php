<?php

/*
 * infrawrench/sdk v0.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.29.0).
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

final class DeploymentRunInput implements \JsonSerializable
{
    /**
     * @param DeployStatus::* $status
     * @param DeployStage::*|null $stage
     * @param list<string>|null $notes
     * @param list<DeployCreatedResource>|null $createdResources
     * @param array{message: string}|null $error
     */
    public function __construct(
        public readonly string $env,
        public readonly string $status,
        public readonly ?string $repo = null,
        public readonly ?string $branch = null,
        public readonly ?string $gitSha = null,
        public readonly ?string $image = null,
        public readonly ?string $stage = null,
        public readonly ?array $notes = null,
        public readonly mixed $output = null,
        public readonly mixed $plan = null,
        public readonly ?array $createdResources = null,
        public readonly ?int $durationMs = null,
        public readonly ?array $error = null,
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
            env: Coerce::toString($data['env'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            repo: Coerce::toStringOrNull($data['repo'] ?? null),
            branch: Coerce::toStringOrNull($data['branch'] ?? null),
            gitSha: Coerce::toStringOrNull($data['gitSha'] ?? null),
            image: Coerce::toStringOrNull($data['image'] ?? null),
            stage: Coerce::toStringOrNull($data['stage'] ?? null),
            notes: Coerce::nullable($data['notes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            output: $data['output'] ?? null,
            plan: $data['plan'] ?? null,
            createdResources: Coerce::nullable($data['createdResources'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): DeployCreatedResource => DeployCreatedResource::fromArray(Coerce::toArray($item)))),
            durationMs: Coerce::toIntOrNull($data['durationMs'] ?? null),
            error: Coerce::toArrayOrNull($data['error'] ?? null),
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
            'env' => $this->env,
            'status' => $this->status,
        ];
        if ($this->repo !== null) {
            $payload['repo'] = $this->repo;
        }
        if ($this->branch !== null) {
            $payload['branch'] = $this->branch;
        }
        if ($this->gitSha !== null) {
            $payload['gitSha'] = $this->gitSha;
        }
        if ($this->image !== null) {
            $payload['image'] = $this->image;
        }
        if ($this->stage !== null) {
            $payload['stage'] = $this->stage;
        }
        if ($this->notes !== null) {
            $payload['notes'] = $this->notes;
        }
        if ($this->output !== null) {
            $payload['output'] = $this->output;
        }
        if ($this->plan !== null) {
            $payload['plan'] = $this->plan;
        }
        if ($this->createdResources !== null) {
            $payload['createdResources'] = array_map(static fn (DeployCreatedResource $item): array => $item->toArray(), $this->createdResources);
        }
        if ($this->durationMs !== null) {
            $payload['durationMs'] = $this->durationMs;
        }
        if ($this->error !== null) {
            $payload['error'] = $this->error;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
