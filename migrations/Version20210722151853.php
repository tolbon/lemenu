<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722151853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_tag_ingredient (ingredient_tag_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_A003A3A056A8A350 (ingredient_tag_id), INDEX IDX_A003A3A0933FE08C (ingredient_id), PRIMARY KEY(ingredient_tag_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, activate TINYINT(1) NOT NULL, INDEX IDX_7D053A93B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION UNSIGNED DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item_ingredient (menu_item_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_EA047E5E9AB44FE0 (menu_item_id), INDEX IDX_EA047E5E933FE08C (ingredient_id), PRIMARY KEY(menu_item_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item_tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item_tag_menu_item (menu_item_tag_id INT NOT NULL, menu_item_id INT NOT NULL, INDEX IDX_E3EE59FA54D70892 (menu_item_tag_id), INDEX IDX_E3EE59FA9AB44FE0 (menu_item_id), PRIMARY KEY(menu_item_tag_id, menu_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_section (id INT AUTO_INCREMENT NOT NULL, menu_section_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION UNSIGNED DEFAULT NULL, INDEX IDX_A5A86751F98E57A8 (menu_section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_section_menu_item (menu_section_id INT NOT NULL, menu_item_id INT NOT NULL, INDEX IDX_982775A6F98E57A8 (menu_section_id), INDEX IDX_982775A69AB44FE0 (menu_item_id), PRIMARY KEY(menu_section_id, menu_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, currency VARCHAR(5) DEFAULT \'EUR\' NOT NULL, activate TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient_tag_ingredient ADD CONSTRAINT FK_A003A3A056A8A350 FOREIGN KEY (ingredient_tag_id) REFERENCES ingredient_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredient_tag_ingredient ADD CONSTRAINT FK_A003A3A0933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE menu_item_ingredient ADD CONSTRAINT FK_EA047E5E9AB44FE0 FOREIGN KEY (menu_item_id) REFERENCES menu_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_item_ingredient ADD CONSTRAINT FK_EA047E5E933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_item_tag_menu_item ADD CONSTRAINT FK_E3EE59FA54D70892 FOREIGN KEY (menu_item_tag_id) REFERENCES menu_item_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_item_tag_menu_item ADD CONSTRAINT FK_E3EE59FA9AB44FE0 FOREIGN KEY (menu_item_id) REFERENCES menu_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_section ADD CONSTRAINT FK_A5A86751F98E57A8 FOREIGN KEY (menu_section_id) REFERENCES menu_section (id)');
        $this->addSql('ALTER TABLE menu_section_menu_item ADD CONSTRAINT FK_982775A6F98E57A8 FOREIGN KEY (menu_section_id) REFERENCES menu_section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_section_menu_item ADD CONSTRAINT FK_982775A69AB44FE0 FOREIGN KEY (menu_item_id) REFERENCES menu_item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient_tag_ingredient DROP FOREIGN KEY FK_A003A3A0933FE08C');
        $this->addSql('ALTER TABLE menu_item_ingredient DROP FOREIGN KEY FK_EA047E5E933FE08C');
        $this->addSql('ALTER TABLE ingredient_tag_ingredient DROP FOREIGN KEY FK_A003A3A056A8A350');
        $this->addSql('ALTER TABLE menu_item_ingredient DROP FOREIGN KEY FK_EA047E5E9AB44FE0');
        $this->addSql('ALTER TABLE menu_item_tag_menu_item DROP FOREIGN KEY FK_E3EE59FA9AB44FE0');
        $this->addSql('ALTER TABLE menu_section_menu_item DROP FOREIGN KEY FK_982775A69AB44FE0');
        $this->addSql('ALTER TABLE menu_item_tag_menu_item DROP FOREIGN KEY FK_E3EE59FA54D70892');
        $this->addSql('ALTER TABLE menu_section DROP FOREIGN KEY FK_A5A86751F98E57A8');
        $this->addSql('ALTER TABLE menu_section_menu_item DROP FOREIGN KEY FK_982775A6F98E57A8');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B1E7706E');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE ingredient_tag');
        $this->addSql('DROP TABLE ingredient_tag_ingredient');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_item');
        $this->addSql('DROP TABLE menu_item_ingredient');
        $this->addSql('DROP TABLE menu_item_tag');
        $this->addSql('DROP TABLE menu_item_tag_menu_item');
        $this->addSql('DROP TABLE menu_section');
        $this->addSql('DROP TABLE menu_section_menu_item');
        $this->addSql('DROP TABLE restaurant');
    }
}
