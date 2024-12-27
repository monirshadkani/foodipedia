<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241226184952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipe_ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, recipe_id_id INTEGER DEFAULT NULL, ingredient_id_id INTEGER DEFAULT NULL, quantity INTEGER NOT NULL, CONSTRAINT FK_22D1FE1369574A48 FOREIGN KEY (recipe_id_id) REFERENCES recipes (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_22D1FE136676F996 FOREIGN KEY (ingredient_id_id) REFERENCES ingredients (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_22D1FE1369574A48 ON recipe_ingredient (recipe_id_id)');
        $this->addSql('CREATE INDEX IDX_22D1FE136676F996 ON recipe_ingredient (ingredient_id_id)');
        $this->addSql('ALTER TABLE ingredients ADD COLUMN unit VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recipe_ingredient');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredients AS SELECT id, name FROM ingredients');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('CREATE TABLE ingredients (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO ingredients (id, name) SELECT id, name FROM __temp__ingredients');
        $this->addSql('DROP TABLE __temp__ingredients');
    }
}
