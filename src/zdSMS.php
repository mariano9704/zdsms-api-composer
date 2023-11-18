<?php

namespace ZonaDigital;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class zdSMS
{
    //UserInformation
    static public function me()
    {
        try {
            $response = Http::acceptJson()
                ->withToken(env('ZDSMS_PERSISTENT_TOKEN'))
                ->get('https://zdsms.cu/api/v1/me');

            if ($response->successful()) {
                return $response->object();
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::info($e->getMessage());
        }

        return false;
    }

    //UserCredit
    static public function credit()
    {
        try {
            $response = Http::acceptJson()
                ->withToken(env('ZDSMS_PERSISTENT_TOKEN'))
                ->get('https://zdsms.cu/api/v1/credit');

            if ($response->successful()) {
                return $response->object();
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::info($e->getMessage());
        }

        return false;
    }

    // SendSMS
    static public function sendSMS(string $recipient, string $mstext)
    {
        try {
            $response = Http::acceptJson()
                ->withToken(env('ZDSMS_PERSISTENT_TOKEN'))
                ->post('https://zdsms.cu/api/v1/message/send', [
                    'recipient' => $recipient,
                    'mstext' => $mstext
                ]);

            if ($response->successful()) {
                $response = $response->object();
                return $response->id;
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::info($e->getMessage());
        }

        return false;
    }

    //smsStatus
    static public function sms_status(string $id)
    {
        try {
            $response = Http::acceptJson()
                ->withToken(env('ZDSMS_PERSISTENT_TOKEN'))
                ->get('https://zdsms.cu/api/v1/message/'.$id.'/status');

            if ($response->successful()) {
                return $response->object();
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::info($e->getMessage());
        }

        return false;
    }

    //SendCampaign
    static public function sendCampaign(string $name, array $recipients, string $mstext)
    {
        try {
            $response = Http::acceptJson()
                ->withToken(env('ZDSMS_PERSISTENT_TOKEN'))
                ->post('https://zdsms.cu/api/v1/campaign/send', [
                    'name' => $name,
                    'recipients' => $recipients,
                    'mstext' => $mstext
                ]);

            if ($response->successful()) {
                $response = $response->object();
                return $response->id;
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::info($e->getMessage());
        }
        return false;
    }

        //smsStatus
        static public function campaign_status(string $id)
        {
            try {
                $response = Http::acceptJson()
                    ->withToken(env('ZDSMS_PERSISTENT_TOKEN'))
                    ->get('https://zdsms.cu/api/v1/campaign/'.$id.'/status');
    
                if ($response->successful()) {
                    return $response->object();
                }
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                Log::info($e->getMessage());
            }
    
            return false;
        }
}
