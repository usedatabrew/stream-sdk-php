<?php

namespace DataBrew;

use Com\Databrew\Gateway\Stream\AcceptCursor;
use Com\Databrew\Gateway\Stream\StreamClient;
use Com\Databrew\Gateway\Stream\StreamRequest;
use Grpc\ChannelCredentials;
use Grpc\ServerStreamingCall;

class Sdk
{
    private string $apiKey;
    private StreamClient $client;

    public function __construct(string $apiKey, ?string $overrideHost = null)
    {
        $this->apiKey = $apiKey;
        $this->client = new StreamClient("localhost:9000", [
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
            'x-api-key' => [$this->apiKey]
        ];
    }
}
