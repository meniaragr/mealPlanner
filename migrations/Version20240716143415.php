<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716143415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipe_ingredient_list (recipe_id INT NOT NULL, ingredient_list_id INT NOT NULL, INDEX IDX_73ED1DE259D8A214 (recipe_id), INDEX IDX_73ED1DE23C991D4D (ingredient_list_id), PRIMARY KEY(recipe_id, ingredient_list_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe_ingredient_list ADD CONSTRAINT FK_73ED1DE259D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_ingredient_list ADD CONSTRAINT FK_73ED1DE23C991D4D FOREIGN KEY (ingredient_list_id) REFERENCES ingredient_list (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe_ingredient_list DROP FOREIGN KEY FK_73ED1DE259D8A214');
        $this->addSql('ALTER TABLE recipe_ingredient_list DROP FOREIGN KEY FK_73ED1DE23C991D4D');
        $this->addSql('DROP TABLE recipe_ingredient_list');
    }
}
