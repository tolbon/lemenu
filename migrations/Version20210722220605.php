<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722220605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_menu_section (menu_id INT NOT NULL, menu_section_id INT NOT NULL, INDEX IDX_DAAA96F4CCD7E912 (menu_id), INDEX IDX_DAAA96F4F98E57A8 (menu_section_id), PRIMARY KEY(menu_id, menu_section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_menu_section ADD CONSTRAINT FK_DAAA96F4CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu_section ADD CONSTRAINT FK_DAAA96F4F98E57A8 FOREIGN KEY (menu_section_id) REFERENCES menu_section (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE menu_menu_section');
    }
}
