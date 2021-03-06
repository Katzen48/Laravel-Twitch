<?php

namespace romanzipp\Twitch\Traits;

use romanzipp\Twitch\Helpers\Paginator;
use romanzipp\Twitch\Result;

trait ModerationTrait
{
    /**
     * Determines whether a string message meets the channel’s AutoMod requirements.
     *
     * AutoMod is a moderation tool that blocks inappropriate or harassing chat with powerful moderator control. AutoMod detects
     * misspellings and evasive language automatically. AutoMod uses machine learning and natural language processing algorithms to
     * hold risky messages from chat so they can be reviewed by a channel moderator before appearing to other viewers in the chat.
     * Moderators can approve or deny any message caught by AutoMod.
     *
     * @see https://dev.twitch.tv/docs/api/reference/#check-automod-status
     *
     * @param array $parameters
     * @return \romanzipp\Twitch\Result
     */
    public function checkAutoModStatus(array $parameters = []): Result
    {
        return $this->post('moderation/enforcements/status', $parameters);
    }

    /**
     * Returns all user bans and un-bans in a channel.
     *
     * @see https://dev.twitch.tv/docs/api/reference/#get-banned-events
     *
     * @param array $parameters
     * @param \romanzipp\Twitch\Helpers\Paginator|null $paginator
     * @return \romanzipp\Twitch\Result
     */
    public function getBannedEvents(array $parameters = [], Paginator $paginator = null): Result
    {
        return $this->get('moderation/banned/events', $parameters, $paginator);
    }

    /**
     * Returns all banned and timed-out users in a channel.
     *
     * @see https://dev.twitch.tv/docs/api/reference/#get-banned-users
     *
     * @param array $parameters
     * @param \romanzipp\Twitch\Helpers\Paginator|null $paginator
     * @return \romanzipp\Twitch\Result
     */
    public function getBannedUsers(array $parameters = [], Paginator $paginator = null): Result
    {
        return $this->get('moderation/banned/users', $parameters, $paginator);
    }

    /**
     * Returns all moderators in a channel.
     *
     * @see https://dev.twitch.tv/docs/api/reference/#get-moderators
     *
     * @param array $parameters
     * @param \romanzipp\Twitch\Helpers\Paginator|null $paginator
     * @return \romanzipp\Twitch\Result
     */
    public function getModerators(array $parameters = [], Paginator $paginator = null): Result
    {
        return $this->get('moderation/moderators', $parameters, $paginator);
    }

    /**
     * Returns a list of moderators or users added and removed as moderators from a channel.
     *
     * @see https://dev.twitch.tv/docs/api/reference/#get-moderator-events
     *
     * @param array $parameters
     * @param \romanzipp\Twitch\Helpers\Paginator|null $paginator
     * @return \romanzipp\Twitch\Result
     */
    public function getModeratorEvents(array $parameters = [], Paginator $paginator = null): Result
    {
        return $this->get('moderation/moderators/events', $parameters, $paginator);
    }

    abstract public function get(string $path = '', array $parameters = [], Paginator $paginator = null);

    abstract public function post(string $path = '', array $parameters = [], Paginator $paginator = null);
}
