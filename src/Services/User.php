<?php

namespace TorboxApi\Services;

use TorboxApi\Utils\Serializer;
use TorboxApi\Models;

class User extends BaseService
{
    /**
     * ### Overview

If you want a new API token, or your old one has been compromised, you may request a new one. If you happen to forget the token, go the [TorBox settings page ](https://torbox.app/settings) and copy the current one. If this still doesn't work, you may contact us at our support email for a new one.

### Authorization

Requires an API key using the Authorization Bearer Header as well as passing the `session_token` from the website to be passed in the body. You can find the `session_token` in the localStorage of your browser on any TorBox.app page under the key `torbox_session_token`. This is a temporary token that only lasts for 1 hour, which is why it is used here to verify the identity of a user as well as their API token.
     */
    public function refreshApiToken(string $apiVersion, ?mixed $input = null): mixed
    {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/user/refreshtoken", [
            'json' => Serializer::serialize($input),
        ]);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Gets a users account data and information.

### Plans

`0` is Free plan

`1` is Essential plan (_$3 plan_)

`2` is Pro plan (_$10 plan_)

`3` is Standard plan (_$5 plan_)

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getUserData(string $apiVersion, string $settings = null): Models\GetUserDataOkResponse
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/user/me", [
            'query' => [
                'settings' => $settings,
            ],
        ]);

        return Serializer::deserialize($data, Models\GetUserDataOkResponse::class);
    }

    /**
     * ### Overview

Automatically adds a referral code to the user's account. This can be used for developers to automatically add their referral to user's accounts who use their service.

This will not override any referral a user already has. If they already have one, then it cannot be changed using this endpoint. It can only be done by the user on the [website](https://torbox.app/subscription).

### Authorization

Requires an API key using the Authorization Bearer Header. Use the user's API key, not your own.
     */
    public function addReferralToAccount(
        string $apiVersion,
        string $referral = null
    ): Models\AddReferralToAccountOkResponse {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/user/addreferral", [
            'query' => [
                'referral' => $referral,
            ],
        ]);

        return Serializer::deserialize($data, Models\AddReferralToAccountOkResponse::class);
    }

    /**
     * ### Overview

Requests a 6 digit code to be sent to the user's email for verification. Used to verify a user actually wants to perform a potentially dangerous action.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getConfirmationCode(string $apiVersion): mixed
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/user/getconfirmation", []);

        return json_decode($data, true);
    }
}
