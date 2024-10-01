<?php

namespace App\Enums;

enum ReportReasonEnum: string
{
    case SPAM                         = 'spam';
    case COMMENT_INAPPROPRIATE        = 'comment_inappropriate';
    case FAKE_EVENT                   = 'abusive';
    case FAKE_USER                    = 'fake_user';
    case FAKE_PROFILE                 = 'fake_profile';
    case FAKE_EVENT_ORGANIZER         = 'fake_event_organizer';
    case FAKE_EVENT_ORGANIZER_PROFILE = 'fake_event_organizer_profile';
    case IDENTITY_PHIPPING            = 'identity_phishing';
    case MODIFIED_PROOF_OF_PAYMENT    = 'modified_proof_of_payment';
}
