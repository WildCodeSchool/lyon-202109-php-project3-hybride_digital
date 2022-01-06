<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105103801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, create_at DATETIME NOT NULL, number_siren VARCHAR(9) DEFAULT NULL, size_firm INT DEFAULT NULL, sector_firm INT NOT NULL, number_sales INT DEFAULT NULL, pole_marketing TINYINT(1) DEFAULT NULL, number_marketers INT DEFAULT NULL, pole_commercial TINYINT(1) DEFAULT NULL, number_commercial INT DEFAULT NULL, crm_used INT NOT NULL, crm_name VARCHAR(255) DEFAULT NULL, time_of_prospec INT NOT NULL, precision_time_of_prospec VARCHAR(255) DEFAULT NULL, type_of_prospec LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prospec_more_client INT NOT NULL, number_closing_per_month INT NOT NULL, precison_closing_per_month VARCHAR(255) DEFAULT NULL, budget_of_prospec_per_month INT NOT NULL, precision_budget_of_prospec_per_month VARCHAR(255) DEFAULT NULL, analyse_prospec TINYINT(1) NOT NULL, satisfied_of_roi TINYINT(1) NOT NULL, priority_commercial JSON NOT NULL, INDEX IDX_E6D6B2979D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2979D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE profil');
    }
}
