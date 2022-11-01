<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221101115655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, display_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, place_id INT NOT NULL, owner_id INT NOT NULL, type_id INT NOT NULL, size_id INT DEFAULT NULL, material_id INT DEFAULT NULL, theme_id INT DEFAULT NULL, color_id INT DEFAULT NULL, display_name VARCHAR(255) NOT NULL, movable TINYINT(1) DEFAULT NULL, INDEX IDX_1F1B251EDA6A219 (place_id), INDEX IDX_1F1B251E7E3C61F9 (owner_id), INDEX IDX_1F1B251EC54C8C93 (type_id), INDEX IDX_1F1B251E498DA827 (size_id), INDEX IDX_1F1B251EE308AC6F (material_id), INDEX IDX_1F1B251E59027487 (theme_id), INDEX IDX_1F1B251E7ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, display_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, display_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, display_name VARCHAR(255) NOT NULL, brand VARCHAR(255) DEFAULT NULL, img_url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E7E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EE308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE place ADD size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('CREATE INDEX IDX_741D53CD498DA827 ON place (size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EDA6A219');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E7E3C61F9');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EC54C8C93');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E498DA827');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EE308AC6F');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E59027487');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E7ADA1FB5');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE theme');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD498DA827');
        $this->addSql('DROP INDEX IDX_741D53CD498DA827 ON place');
        $this->addSql('ALTER TABLE place DROP size_id');
    }
}
