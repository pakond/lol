<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810215740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skin (id INT AUTO_INCREMENT NOT NULL, rel_id INT DEFAULT NULL, idnum VARCHAR(255) NOT NULL, num INT NOT NULL, name VARCHAR(255) NOT NULL, chromas TINYINT(1) NOT NULL, INDEX IDX_279681E4E0AA1CD (rel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skin ADD CONSTRAINT FK_279681E4E0AA1CD FOREIGN KEY (rel_id) REFERENCES champion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE skin');
    }
}
