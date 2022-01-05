<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105000534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6FBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_CB988C6FBCF5E72D ON annonces (categorie_id)');
        $this->addSql('ALTER TABLE sejours ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE sejours ADD CONSTRAINT FK_2E2D92D1BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_2E2D92D1BCF5E72D ON sejours (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6FBCF5E72D');
        $this->addSql('DROP INDEX IDX_CB988C6FBCF5E72D ON annonces');
        $this->addSql('ALTER TABLE annonces DROP categorie_id');
        $this->addSql('ALTER TABLE sejours DROP FOREIGN KEY FK_2E2D92D1BCF5E72D');
        $this->addSql('DROP INDEX IDX_2E2D92D1BCF5E72D ON sejours');
        $this->addSql('ALTER TABLE sejours DROP categorie_id');
    }
}