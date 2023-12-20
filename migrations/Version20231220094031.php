<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231220094031 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE balance_operation (id UUID NOT NULL, user_id UUID DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D2CB9550A76ED395 ON balance_operation (user_id)');
        $this->addSql('COMMENT ON COLUMN balance_operation.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN balance_operation.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE "user" (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE balance_operation ADD CONSTRAINT FK_D2CB9550A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE balance_operation DROP CONSTRAINT FK_D2CB9550A76ED395');
        $this->addSql('DROP TABLE balance_operation');
        $this->addSql('DROP TABLE "user"');
    }
}
