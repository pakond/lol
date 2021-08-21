<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810225711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skin ADD id_champion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skin ADD CONSTRAINT FK_279681EE26D1A1C FOREIGN KEY (id_champion_id) REFERENCES champion (id)');
        $this->addSql('CREATE INDEX IDX_279681EE26D1A1C ON skin (id_champion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skin DROP FOREIGN KEY FK_279681EE26D1A1C');
        $this->addSql('DROP INDEX IDX_279681EE26D1A1C ON skin');
        $this->addSql('ALTER TABLE skin DROP id_champion_id');
    }
}
