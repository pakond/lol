<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210814230230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE language_champion_skin (id INT AUTO_INCREMENT NOT NULL, language_id INT DEFAULT NULL, champion_id INT DEFAULT NULL, skin_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_38B5C36882F1BAF4 (language_id), INDEX IDX_38B5C368FA7FD7EB (champion_id), INDEX IDX_38B5C368F404637F (skin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE language_champion_skin ADD CONSTRAINT FK_38B5C36882F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE language_champion_skin ADD CONSTRAINT FK_38B5C368FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
        $this->addSql('ALTER TABLE language_champion_skin ADD CONSTRAINT FK_38B5C368F404637F FOREIGN KEY (skin_id) REFERENCES skin (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE language_champion_skin');
    }
}
