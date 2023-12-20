<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231220115849 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
            CREATE OR REPLACE VIEW balance AS
            SELECT
                bo.user_id,
                SUM(CASE WHEN bo.type = 'ACCRUAL' THEN bo.amount ELSE -bo.amount END) AS balance
            FROM balance_operation bo
            GROUP BY user_id; 
        SQL);

    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<SQL
            DROP VIEW balance;
        SQL);
    }
}
