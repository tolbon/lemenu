<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806222728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D03E649E7927C74 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D03E649E7927D54 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label_menu_item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D03E638E7927C74 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label_restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D9E3649E7927C74 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, activate TINYINT(1) NOT NULL, url_slug VARCHAR(255) NOT NULL, insert_date_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7D053A93B1E7706E (restaurant_id), UNIQUE INDEX UNIQ_8D03E649E7927704 (restaurant_id, name), UNIQUE INDEX UNIQ_8E03F6E506817D74 (restaurant_id, url_slug, activate), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, price1 DOUBLE PRECISION DEFAULT NULL, price2 DOUBLE PRECISION DEFAULT NULL, price3 DOUBLE PRECISION DEFAULT NULL, insert_date_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D754D550B1E7706E (restaurant_id), UNIQUE INDEX UNIQ_8D03E146D7927704 (restaurant_id, name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_menu_section (id INT AUTO_INCREMENT NOT NULL, menu_id INT NOT NULL, menu_section_parent_id INT NOT NULL, menu_section_id INT NOT NULL, position SMALLINT NOT NULL, insert_date_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DAAA96F4CCD7E912 (menu_id), INDEX IDX_DAAA96F43D096A86 (menu_section_parent_id), INDEX IDX_DAAA96F4F98E57A8 (menu_section_id), UNIQUE INDEX UNIQ_79AEC8DF98E57 (menu_id, menu_section_id), UNIQUE INDEX UNIQ_9AEC8DF98E57A2 (menu_id, menu_section_parent_id, position), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_section (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, price1 DOUBLE PRECISION DEFAULT NULL, price2 DOUBLE PRECISION DEFAULT NULL, price3 DOUBLE PRECISION DEFAULT NULL, display_currency_symbol_on_title TINYINT(1) NOT NULL, display_currency_on_children TINYINT(1) NOT NULL, display_children_section_after_menu_items TINYINT(1) NOT NULL, title_price1 VARCHAR(255) DEFAULT NULL, title_price2 VARCHAR(255) DEFAULT NULL, title_price3 VARCHAR(255) DEFAULT NULL, insert_date_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_A5A86751B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_section_menu_item (id INT AUTO_INCREMENT NOT NULL, menu_section_id INT NOT NULL, menu_item_id INT NOT NULL, position INT NOT NULL, insert_date_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_982775A6F98E57A8 (menu_section_id), INDEX IDX_982775A69AB44FE0 (menu_item_id), UNIQUE INDEX UNIQ_AE73CD8F89E37 (menu_section_id, menu_item_id), UNIQUE INDEX UNIQ_A9CE8DE89E572 (menu_section_id, position), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1024) NOT NULL, currency VARCHAR(3) NOT NULL, activate TINYINT(1) NOT NULL, url_slug VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_75DF1DF98E57 (url_slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE menu_item ADD CONSTRAINT FK_D754D550B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE menu_menu_section ADD CONSTRAINT FK_DAAA96F4CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE menu_menu_section ADD CONSTRAINT FK_DAAA96F43D096A86 FOREIGN KEY (menu_section_parent_id) REFERENCES menu_section (id)');
        $this->addSql('ALTER TABLE menu_menu_section ADD CONSTRAINT FK_DAAA96F4F98E57A8 FOREIGN KEY (menu_section_id) REFERENCES menu_section (id)');
        $this->addSql('ALTER TABLE menu_section ADD CONSTRAINT FK_A5A86751B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE menu_section_menu_item ADD CONSTRAINT FK_982775A6F98E57A8 FOREIGN KEY (menu_section_id) REFERENCES menu_section (id)');
        $this->addSql('ALTER TABLE menu_section_menu_item ADD CONSTRAINT FK_982775A69AB44FE0 FOREIGN KEY (menu_item_id) REFERENCES menu_item (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_menu_section DROP FOREIGN KEY FK_DAAA96F4CCD7E912');
        $this->addSql('ALTER TABLE menu_section_menu_item DROP FOREIGN KEY FK_982775A69AB44FE0');
        $this->addSql('ALTER TABLE menu_menu_section DROP FOREIGN KEY FK_DAAA96F43D096A86');
        $this->addSql('ALTER TABLE menu_menu_section DROP FOREIGN KEY FK_DAAA96F4F98E57A8');
        $this->addSql('ALTER TABLE menu_section_menu_item DROP FOREIGN KEY FK_982775A6F98E57A8');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B1E7706E');
        $this->addSql('ALTER TABLE menu_item DROP FOREIGN KEY FK_D754D550B1E7706E');
        $this->addSql('ALTER TABLE menu_section DROP FOREIGN KEY FK_A5A86751B1E7706E');
        $this->addSql('DROP TABLE allergy');
        $this->addSql('DROP TABLE diet');
        $this->addSql('DROP TABLE label_menu_item');
        $this->addSql('DROP TABLE label_restaurant');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_item');
        $this->addSql('DROP TABLE menu_menu_section');
        $this->addSql('DROP TABLE menu_section');
        $this->addSql('DROP TABLE menu_section_menu_item');
        $this->addSql('DROP TABLE restaurant');
    }
}
