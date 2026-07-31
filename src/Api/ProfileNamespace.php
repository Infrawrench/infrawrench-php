<?php

/*
 * infrawrench/sdk v0.25.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.25.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Api;

use Infrawrench\Sdk\Internal\ApiNamespace;
use Infrawrench\Sdk\Internal\Coerce;
use Infrawrench\Sdk\Internal\RequestSpec;
use Infrawrench\Sdk\Internal\Transport;
use Infrawrench\Sdk\Model\AccountDeleted;
use Infrawrench\Sdk\Model\AccountDeletionPreview;
use Infrawrench\Sdk\Model\Ok;
use Infrawrench\Sdk\Model\Profile;
use Infrawrench\Sdk\Model\ProfileSummary;
use Infrawrench\Sdk\RequestOptions;

/** `$client->profile` */
final class ProfileNamespace extends ApiNamespace
{
    /** `$client->profile->emailChange` */
    public readonly ProfileEmailChangeNamespace $emailChange;

    /** `$client->profile->mfa` */
    public readonly ProfileMfaNamespace $mfa;

    /** `$client->profile->sessions` */
    public readonly ProfileSessionsNamespace $sessions;

    public function __construct(Transport $transport)
    {
        parent::__construct($transport);
        $this->emailChange = new ProfileEmailChangeNamespace($this->transport);
        $this->mfa = new ProfileMfaNamespace($this->transport);
        $this->sessions = new ProfileSessionsNamespace($this->transport);
    }

    /**
     * Delete the signed-in user's account
     *
     * Irreversible. Organizations where the caller is the only member are deleted and their
     * subscriptions cancelled; other memberships are simply removed. Refuses with
     * `transfer_ownership_required` while the caller is the only owner of an organization other
     * people belong to.
     *
     * DELETE /api/profile
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Recent sign-in required. Send the user through sign-in again and retry; the
     * request itself was well-formed.
     *
     * Raises on 409: The caller still solely owns a shared organization; nothing was deleted.
     *
     * Raises on 502: A subscription could not be cancelled; nothing was deleted.
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function delete(?RequestOptions $options = null): AccountDeleted
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'DELETE',
                path: '/api/profile',
            ),
            $options,
        );

        return AccountDeleted::fromArray(Coerce::toArray($data));
    }

    /**
     * What deleting this account would do
     *
     * Read-only. Lets a confirmation screen name the organizations that go with the account, and
     * the ones that must be handed over first.
     *
     * GET /api/profile/deletion-preview
     *
     * Raises on 401: Unauthenticated
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function deletionPreview(?RequestOptions $options = null): AccountDeletionPreview
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/profile/deletion-preview',
            ),
            $options,
        );

        return AccountDeletionPreview::fromArray(Coerce::toArray($data));
    }

    /**
     * The signed-in user's account profile
     *
     * User-scoped, not organization-scoped: one WorkOS identity is shared across every
     * organization the user belongs to.
     *
     * GET /api/profile
     *
     * Raises on 401: Unauthenticated
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function get(?RequestOptions $options = null): Profile
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'GET',
                path: '/api/profile',
            ),
            $options,
        );

        return Profile::fromArray(Coerce::toArray($data));
    }

    /**
     * Mint a password reset link for the signed-in user
     *
     * Returns a one-time AuthKit-hosted reset URL rather than emailing it — the caller already
     * holds a valid session for the account. Also the way to set a first password on an SSO or
     * OAuth-only account.
     *
     * POST /api/profile/password-reset
     *
     * Raises on 401: Unauthenticated
     *
     * Raises on 403: Recent sign-in required. Send the user through sign-in again and retry; the
     * request itself was well-formed.
     *
     * @return array{passwordResetUrl: string, expiresAt: string}
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function passwordReset(?RequestOptions $options = null): array
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/password-reset',
            ),
            $options,
        );

        return Coerce::toArray($data);
    }

    /**
     * Re-send the email verification message
     *
     * POST /api/profile/send-verification-email
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function sendVerificationEmail(?RequestOptions $options = null): Ok
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'POST',
                path: '/api/profile/send-verification-email',
            ),
            $options,
        );

        return Ok::fromArray(Coerce::toArray($data));
    }

    /**
     * Update the signed-in user's name
     *
     * PATCH /api/profile
     *
     * Raises on 400: Bad request
     *
     * Raises on 401: Unauthenticated
     *
     * @param array{firstName?: string, lastName?: string}|null $body
     * @throws \Infrawrench\Sdk\ApiException on any non-2xx response.
     * @throws \Infrawrench\Sdk\MissingParameterException if a path parameter has no value.
     */
    public function update(?array $body = null, ?RequestOptions $options = null): ProfileSummary
    {
        $data = $this->transport->request(
            new RequestSpec(
                method: 'PATCH',
                path: '/api/profile',
                body: $body,
                hasBody: $body !== null,
            ),
            $options,
        );

        return ProfileSummary::fromArray(Coerce::toArray($data));
    }
}
