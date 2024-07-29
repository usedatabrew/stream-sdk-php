<?php

namespace DataBrew;

use Com\Databrew\Gateway\Stream\AcceptCursor;
use Com\Databrew\Gateway\Stream\StreamClient;
use Com\Databrew\Gateway\Stream\StreamRequest;
use Grpc\ChannelCredentials;
use Grpc\ServerStreamingCall;

class Sdk
{
    private Options $opts;
    private StreamClient $client;

    public function __construct(Options $opts)
    {
        $this->opts = $opts;

        $this->client = new StreamClient($this->opts->getStreamHost(), [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);
    }

    public function subscribe(string $pipelineID): ServerStreamingCall
    {
        $request = new StreamRequest();
        $request->setId($pipelineID);
        $request->setAutoAck(true);
        return $this->client->GetStream($request, $this->getMetadata());
    }

    public function ackCursor(AcceptCursor $acceptCursor): \Grpc\UnaryCall
    {
        return $this->client->AckOffset($acceptCursor);
    }

    private function getMetadata(): array
    {
        return [
            'x-api-key' => [$this->opts->getApiKey()]
        ];
    }

    public function addStripeConnectedAccounts(int $catalogId, array $accounts)
    {
        $apiHost = $this->opts->getApiHost();
        $apiKey = $this->opts->getApiKey();

        $url = "$apiHost/api/v1/catalogs/rest/stripe/connected-accounts/$catalogId";

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "x-databrew-key: $apiKey",
        );

        $data = new \stdClass();
        $data->accounts = $accounts;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
