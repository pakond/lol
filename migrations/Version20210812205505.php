<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210812205505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE info (id INT AUTO_INCREMENT NOT NULL, champion_id INT DEFAULT NULL, attack SMALLINT NOT NULL, defense SMALLINT NOT NULL, magic SMALLINT NOT NULL, difficulty SMALLINT NOT NULL, INDEX IDX_CB893157FA7FD7EB (champion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE info ADD CONSTRAINT FK_CB893157FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE info');
    }
}
