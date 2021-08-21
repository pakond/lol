<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210812213225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, nameid VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, tooltip LONGTEXT NOT NULL, maxrank VARCHAR(255) NOT NULL, cooldown LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', cooldownburn VARCHAR(255) NOT NULL, cost LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', costburn VARCHAR(255) NOT NULL, effectburn LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', costtype VARCHAR(255) NOT NULL, maxammo VARCHAR(255) NOT NULL, range_ LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', rangeburn VARCHAR(255) NOT NULL, resource VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE spell');
    }
}
