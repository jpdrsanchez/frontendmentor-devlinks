<?php

namespace App\Domain\Link\Enums;

enum LinkType: string {
    case GITHUB = 'github';
    case FRONTEND_MENTOR = 'frontendMentor';
    case TWITTER = 'twitter';
    case LINKEDIN = 'linkedin';
    case YOUTUBE = 'youtube';
    case FACEBOOK = 'facebook';
    case TWITCH = 'twitch';
    case DEV_TO = 'dev.to';
    case CODE_WARS = 'codeWars';
    case FREE_CODE_CAMP = 'freeCodeCamp';
    case GITLAB = 'gitlab';
    case HASH_NODE = 'hashNode';
    case STACK_OVERFLOW = 'stackOverflow';
}
