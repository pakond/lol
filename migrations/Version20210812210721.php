<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210812210721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info DROP FOREIGN KEY FK_CB893157FA7FD7EB');
        $this->addSql('DROP INDEX IDX_CB893157FA7FD7EB ON info');
        $this->addSql('ALTER TABLE info DROP champion_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info ADD champion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info ADD CONSTRAINT FK_CB893157FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
        $this->addSql('CREATE INDEX IDX_CB893157FA7FD7EB ON info (champion_id)');
    }
}
