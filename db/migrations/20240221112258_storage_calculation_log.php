<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class StorageCalculationLog extends AbstractMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        $sql = '
        CREATE TABLE `storage_calculation_log` (
            `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
            `log_execution` LONGTEXT NOT NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );';

        $this->execute($sql);
    }

    /**
     * @return void
     */
    public function down(): void
    {
        $sql = 'DROP TABLE `storage_calculation_log`;';

        $this->execute($sql);
    }
}
