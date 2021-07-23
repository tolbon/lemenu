<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723171910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item ADD display_currency_symbol TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE menu_section ADD display_currency_symbol TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE restaurant ADD url_slug VARCHAR(255) DEFAULT NULL, ADD address VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item DROP display_currency_symbol');
        $this->addSql('ALTER TABLE menu_section DROP display_currency_symbol');
        $this->addSql('ALTER TABLE restaurant DROP url_slug, DROP address, DROP phone');
    }
}
