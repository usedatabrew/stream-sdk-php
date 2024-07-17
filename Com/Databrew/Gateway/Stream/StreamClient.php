<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Com\Databrew\Gateway\Stream;

/**
 */
class StreamClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Com\Databrew\Gateway\Stream\StreamRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function GetStream(\Com\Databrew\Gateway\Stream\StreamRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/com.databrew.gateway.stream.Stream/GetStream',
        $argument,
        ['\Com\Databrew\Gateway\Stream\StreamResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Com\Databrew\Gateway\Stream\AcceptCursor $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AckOffset(\Com\Databrew\Gateway\Stream\AcceptCursor $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/com.databrew.gateway.stream.Stream/AckOffset',
        $argument,
        ['\Com\Databrew\Gateway\Stream\AcceptedCursor', 'decode'],
        $metadata, $options);
    }

}
