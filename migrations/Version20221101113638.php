<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221101113638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, unit VARCHAR(255) NOT NULL, area DOUBLE PRECISION DEFAULT NULL, width DOUBLE PRECISION DEFAULT NULL, length DOUBLE PRECISION DEFAULT NULL, fits VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, display_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place ADD owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD7E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('CREATE INDEX IDX_741D53CD7E3C61F9 ON place (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE type');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD7E3C61F9');
        $this->addSql('DROP INDEX IDX_741D53CD7E3C61F9 ON place');
        $this->addSql('ALTER TABLE place DROP owner_id');
    }
}
