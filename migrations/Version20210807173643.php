<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210807173643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, stats_id INT NOT NULL, nameid VARCHAR(255) NOT NULL, keyid INT NOT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, lore LONGTEXT NOT NULL, blurb LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_45437EB43DA5256D (image_id), UNIQUE INDEX UNIQ_45437EB470AA3482 (stats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, full VARCHAR(255) NOT NULL, sprite VARCHAR(255) NOT NULL, imggroup VARCHAR(255) NOT NULL, x SMALLINT NOT NULL, y SMALLINT NOT NULL, w SMALLINT NOT NULL, h SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats (id INT AUTO_INCREMENT NOT NULL, hp SMALLINT NOT NULL, hpperlevel SMALLINT NOT NULL, mp SMALLINT NOT NULL, mpperlevel SMALLINT NOT NULL, movespeed SMALLINT NOT NULL, armor SMALLINT NOT NULL, armorperlevel DOUBLE PRECISION NOT NULL, spellblock SMALLINT NOT NULL, spellblockperlevel DOUBLE PRECISION NOT NULL, attackrange SMALLINT NOT NULL, hpregen SMALLINT NOT NULL, hpregenperlevel SMALLINT NOT NULL, mpregen SMALLINT NOT NULL, mpregenperlevel SMALLINT NOT NULL, crit SMALLINT NOT NULL, critperlevel SMALLINT NOT NULL, attackdamage SMALLINT NOT NULL, attackdamageperlevel SMALLINT NOT NULL, attackspeedperlevel DOUBLE PRECISION NOT NULL, attackspeed DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB43DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB470AA3482 FOREIGN KEY (stats_id) REFERENCES stats (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB43DA5256D');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB470AA3482');
        $this->addSql('DROP TABLE champion');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE stats');
    }
}
