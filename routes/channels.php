<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::channel('message.meetinglog.{meetinglogId}', function(User $user) {
    return $user ? $user : null;
});

Broadcast::channel('external.message.meetinglog.{meetinglogId}', function(User $user) {
    return $user ? $user : null;
});
