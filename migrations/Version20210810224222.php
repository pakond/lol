<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810224222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skin DROP FOREIGN KEY FK_279681E4E0AA1CD');
        $this->addSql('DROP INDEX IDX_279681E4E0AA1CD ON skin');
        $this->addSql('ALTER TABLE skin DROP rel_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skin ADD rel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skin ADD CONSTRAINT FK_279681E4E0AA1CD FOREIGN KEY (rel_id) REFERENCES champion (id)');
        $this->addSql('CREATE INDEX IDX_279681E4E0AA1CD ON skin (rel_id)');
    }
}
