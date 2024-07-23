<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: stream.proto

namespace Com\Databrew\Gateway\Stream;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>com.databrew.gateway.stream.StreamRequest</code>
 */
class StreamRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string id = 1;</code>
     */
    protected $id = '';
    /**
     * Generated from protobuf field <code>bool auto_ack = 2;</code>
     */
    protected $auto_ack = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *     @type bool $auto_ack
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Stream::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string id = 1;</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>string id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool auto_ack = 2;</code>
     * @return bool
     */
    public function getAutoAck()
    {
        return $this->auto_ack;
    }

    /**
     * Generated from protobuf field <code>bool auto_ack = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setAutoAck($var)
    {
        GPBUtil::checkBool($var);
        $this->auto_ack = $var;

        return $this;
    }

}
