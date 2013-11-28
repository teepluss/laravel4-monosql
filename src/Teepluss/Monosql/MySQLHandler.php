<?php namespace Teepluss\Monosql;

use Monolog\Logger;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\AbstractProcessingHandler;

class MySQLHandler extends AbstractProcessingHandler {

    protected $connection;

    protected $table = 'logs';

    public function __construct($connection, $level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->connection = $connection;

        $this->table = \Config::get('monosql::config.table');
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    protected function write(array $record)
    {
        $data = array(
            'channel'    => $record['channel'],
            'message'    => $record['message'],
            'level'      => $record['level'],
            'level_name' => $record['level_name'],
            'context'    => json_encode($record['context']),
            'formatted'  => $record['formatted'],
            'created_at' => $record['datetime']->format('Y-m-d H:i:s')
        );

        $this->connection->table($this->table)->insert($data);
    }

}