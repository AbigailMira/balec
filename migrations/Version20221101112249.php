<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221101112249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD7E3C61F9');
        $this->addSql('DROP INDEX IDX_741D53CD7E3C61F9 ON place');
        $this->addSql('ALTER TABLE place ADD floor_id INT DEFAULT NULL, DROP owner_id');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD854679E2 FOREIGN KEY (floor_id) REFERENCES floor (id)');
        $this->addSql('CREATE INDEX IDX_741D53CD854679E2 ON place (floor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD854679E2');
        $this->addSql('DROP INDEX IDX_741D53CD854679E2 ON place');
        $this->addSql('ALTER TABLE place ADD owner_id INT NOT NULL, DROP floor_id');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD7E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('CREATE INDEX IDX_741D53CD7E3C61F9 ON place (owner_id)');
    }
}
