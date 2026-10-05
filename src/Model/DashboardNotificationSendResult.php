<?php

/*
 * infrawrench/sdk v1.60.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.60.0).
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

final class DashboardNotificationSendResult implements \JsonSerializable
{
    /**
     * @param array{attempted: int, succeeded: int} $slack
     * @param array{attempted: int, succeeded: int} $teams
     * @param array{attempted: int, succeeded: int} $email
     * @param bool $pdfAttached Whether a PDF was rendered and sent.
     * @param int $slackFilesUploaded Slack channels that also received the PDF. Lower than `slack.succeeded` when the Slack install predates the `files:write` scope.
     */
    public function __construct(
        public readonly int $attempted,
        public readonly int $succeeded,
        public readonly array $slack,
        public readonly array $teams,
        public readonly array $email,
        public readonly bool $pdfAttached,
        public readonly int $slackFilesUploaded,
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
            attempted: Coerce::toInt($data['attempted'] ?? null),
            succeeded: Coerce::toInt($data['succeeded'] ?? null),
            slack: Coerce::toArray($data['slack'] ?? null),
            teams: Coerce::toArray($data['teams'] ?? null),
            email: Coerce::toArray($data['email'] ?? null),
            pdfAttached: Coerce::toBool($data['pdfAttached'] ?? null),
            slackFilesUploaded: Coerce::toInt($data['slackFilesUploaded'] ?? null),
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
            'attempted' => $this->attempted,
            'succeeded' => $this->succeeded,
            'slack' => $this->slack,
            'teams' => $this->teams,
            'email' => $this->email,
            'pdfAttached' => $this->pdfAttached,
            'slackFilesUploaded' => $this->slackFilesUploaded,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
