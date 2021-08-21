<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811200612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allytips (id INT AUTO_INCREMENT NOT NULL, champion_id INT DEFAULT NULL, tip1 LONGTEXT NOT NULL, tip2 LONGTEXT NOT NULL, tip3 LONGTEXT NOT NULL, INDEX IDX_FBE98A56FA7FD7EB (champion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE allytips ADD CONSTRAINT FK_FBE98A56FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE allytips');
    }
}
