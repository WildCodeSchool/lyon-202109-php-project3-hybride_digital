<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220112153613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profil_marketing (id INT AUTO_INCREMENT NOT NULL, profil_id INT NOT NULL, message_for_target VARCHAR(255) NOT NULL, social_network_used LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_social_network_use VARCHAR(255) DEFAULT NULL, social_network_engage INT NOT NULL, prc_social_network_en VARCHAR(255) DEFAULT NULL, action_sea_mep LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_action_sea_mep VARCHAR(255) DEFAULT NULL, action_seo_mep LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_action_seo_mep VARCHAR(255) DEFAULT NULL, social_network_best_roi LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_snbest_roi VARCHAR(255) DEFAULT NULL, vector_marketing INT NOT NULL, prc_vector_marketing VARCHAR(255) DEFAULT NULL, priority_marketing LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_priority_marketing VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_3CFA5748275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil_marketing ADD CONSTRAINT FK_3CFA5748275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE profil_marketing');
    }
}
