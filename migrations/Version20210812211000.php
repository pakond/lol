<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210812211000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion ADD info_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB45D8BC1F8 FOREIGN KEY (info_id) REFERENCES info (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_45437EB45D8BC1F8 ON champion (info_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB45D8BC1F8');
        $this->addSql('DROP INDEX UNIQ_45437EB45D8BC1F8 ON champion');
        $this->addSql('ALTER TABLE champion DROP info_id');
    }
}
