<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210814164024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE language_champion ADD champion_id INT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL, ADD lore LONGTEXT NOT NULL, ADD blurb LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE language_champion ADD CONSTRAINT FK_29E1268EFA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
        $this->addSql('CREATE INDEX IDX_29E1268EFA7FD7EB ON language_champion (champion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE language_champion DROP FOREIGN KEY FK_29E1268EFA7FD7EB');
        $this->addSql('DROP INDEX IDX_29E1268EFA7FD7EB ON language_champion');
        $this->addSql('ALTER TABLE language_champion DROP champion_id, DROP title, DROP lore, DROP blurb');
    }
}
