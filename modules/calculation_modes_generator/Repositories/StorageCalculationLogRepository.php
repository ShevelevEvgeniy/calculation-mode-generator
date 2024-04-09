<?php

namespace app\Repositories;

use Craft\Contracts\DataBaseConnectionInterface;

class StorageCalculationLogRepository
{
    /**
     * @var string
     */
    private string $table_name = 'storage_calculation_log';

    /**
     * @param DataBaseConnectionInterface $db
     */
    public function __construct(private readonly DataBaseConnectionInterface $db) { }

    /**
     * @param $context
     * @return bool
     */
    public function save($context): bool
    {
        $values = [
            'log_execution' => serialize($context),
        ];

        if ($this->db->insert($this->table_name, $values) > 0) {
            return true;
        }

        return false;
    }
}
