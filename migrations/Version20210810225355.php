<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810225355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE skin_champion');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skin_champion (skin_id INT NOT NULL, champion_id INT NOT NULL, INDEX IDX_38B72DCAF404637F (skin_id), INDEX IDX_38B72DCAFA7FD7EB (champion_id), PRIMARY KEY(skin_id, champion_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE skin_champion ADD CONSTRAINT FK_38B72DCAF404637F FOREIGN KEY (skin_id) REFERENCES skin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skin_champion ADD CONSTRAINT FK_38B72DCAFA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
    }
}
