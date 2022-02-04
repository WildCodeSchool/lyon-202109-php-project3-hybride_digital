<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204135456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE action_ressource (action_id INT NOT NULL, ressource_id INT NOT NULL, INDEX IDX_379956599D32F035 (action_id), INDEX IDX_37995659FC6CD52A (ressource_id), PRIMARY KEY(action_id, ressource_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE action_check (id INT AUTO_INCREMENT NOT NULL, step_check_id INT NOT NULL, action_id INT DEFAULT NULL, is_complete TINYINT(1) NOT NULL, INDEX IDX_DB4060AF40968788 (step_check_id), INDEX IDX_DB4060AF9D32F035 (action_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, create_at DATETIME NOT NULL, number_siren VARCHAR(9) DEFAULT NULL, size_firm INT DEFAULT NULL, sector_firm INT NOT NULL, number_sales INT DEFAULT NULL, pole_marketing TINYINT(1) DEFAULT NULL, number_marketers INT DEFAULT NULL, pole_commercial TINYINT(1) DEFAULT NULL, number_commercial INT DEFAULT NULL, INDEX IDX_E6D6B297A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_commercial (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, crm_used INT NOT NULL, crm_name VARCHAR(255) DEFAULT NULL, time_of_prospec INT NOT NULL, precis_time_of_prospec VARCHAR(255) DEFAULT NULL, type_of_prospec LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prospec_more_client INT NOT NULL, number_clos_per_month INT NOT NULL, precis_clos_per_month VARCHAR(255) DEFAULT NULL, bud_of_prosp_per_month INT NOT NULL, prcis_bud_pros_month VARCHAR(255) DEFAULT NULL, analyse_prospec TINYINT(1) NOT NULL, satisfied_of_roi TINYINT(1) NOT NULL, priority_commercial JSON NOT NULL, prcis_prio_commercial VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_4D95A850275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_marketing (id INT AUTO_INCREMENT NOT NULL, profil_id INT NOT NULL, message_for_target VARCHAR(255) NOT NULL, social_network_used LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_social_network_use VARCHAR(255) DEFAULT NULL, social_network_engage INT NOT NULL, prc_social_network_en VARCHAR(255) DEFAULT NULL, action_sea_mep LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_action_sea_mep VARCHAR(255) DEFAULT NULL, action_seo_mep LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_action_seo_mep VARCHAR(255) DEFAULT NULL, social_network_best_roi LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_snbest_roi VARCHAR(255) DEFAULT NULL, vector_marketing INT NOT NULL, prc_vector_marketing VARCHAR(255) DEFAULT NULL, priority_marketing LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prc_priority_marketing VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_3CFA5748275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, link VARCHAR(300) DEFAULT NULL, update_at DATETIME DEFAULT NULL, file_name VARCHAR(300) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roadmap (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roadmap_step (roadmap_id INT NOT NULL, step_id INT NOT NULL, INDEX IDX_FA9182DC135345B2 (roadmap_id), INDEX IDX_FA9182DC73B21E9C (step_id), PRIMARY KEY(roadmap_id, step_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roadmap_check (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, roadmap_id INT NOT NULL, is_complete TINYINT(1) NOT NULL, INDEX IDX_9C3D6617A76ED395 (user_id), INDEX IDX_9C3D6617135345B2 (roadmap_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_media (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, linked_in VARCHAR(512) DEFAULT NULL, facebook VARCHAR(512) DEFAULT NULL, tiktok VARCHAR(512) DEFAULT NULL, twitter VARCHAR(512) DEFAULT NULL, instagram VARCHAR(512) DEFAULT NULL, snapchat VARCHAR(512) DEFAULT NULL, youtube VARCHAR(512) DEFAULT NULL, pinterest VARCHAR(512) DEFAULT NULL, site VARCHAR(512) DEFAULT NULL, UNIQUE INDEX UNIQ_20BC159EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_action (step_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_6AD241E873B21E9C (step_id), INDEX IDX_6AD241E89D32F035 (action_id), PRIMARY KEY(step_id, action_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_check (id INT AUTO_INCREMENT NOT NULL, roadmap_check_id INT NOT NULL, step_id INT NOT NULL, is_complete TINYINT(1) NOT NULL, INDEX IDX_20AC5BEC14E7F069 (roadmap_check_id), INDEX IDX_20AC5BEC73B21E9C (step_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, companyname VARCHAR(255) DEFAULT NULL, domainname VARCHAR(255) DEFAULT NULL, businesssector VARCHAR(100) DEFAULT NULL, phonenumber VARCHAR(20) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, postcode VARCHAR(20) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, advertisingbudget DOUBLE PRECISION DEFAULT NULL, marketarea VARCHAR(255) DEFAULT NULL, first_connection TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_379956599D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_37995659FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_check ADD CONSTRAINT FK_DB4060AF40968788 FOREIGN KEY (step_check_id) REFERENCES step_check (id)');
        $this->addSql('ALTER TABLE action_check ADD CONSTRAINT FK_DB4060AF9D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE profil_commercial ADD CONSTRAINT FK_4D95A850275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE profil_marketing ADD CONSTRAINT FK_3CFA5748275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE roadmap_step ADD CONSTRAINT FK_FA9182DC135345B2 FOREIGN KEY (roadmap_id) REFERENCES roadmap (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roadmap_step ADD CONSTRAINT FK_FA9182DC73B21E9C FOREIGN KEY (step_id) REFERENCES step (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roadmap_check ADD CONSTRAINT FK_9C3D6617A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE roadmap_check ADD CONSTRAINT FK_9C3D6617135345B2 FOREIGN KEY (roadmap_id) REFERENCES roadmap (id)');
        $this->addSql('ALTER TABLE social_media ADD CONSTRAINT FK_20BC159EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE step_action ADD CONSTRAINT FK_6AD241E873B21E9C FOREIGN KEY (step_id) REFERENCES step (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step_action ADD CONSTRAINT FK_6AD241E89D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step_check ADD CONSTRAINT FK_20AC5BEC14E7F069 FOREIGN KEY (roadmap_check_id) REFERENCES roadmap_check (id)');
        $this->addSql('ALTER TABLE step_check ADD CONSTRAINT FK_20AC5BEC73B21E9C FOREIGN KEY (step_id) REFERENCES step (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_ressource DROP FOREIGN KEY FK_379956599D32F035');
        $this->addSql('ALTER TABLE action_check DROP FOREIGN KEY FK_DB4060AF9D32F035');
        $this->addSql('ALTER TABLE step_action DROP FOREIGN KEY FK_6AD241E89D32F035');
        $this->addSql('ALTER TABLE profil_commercial DROP FOREIGN KEY FK_4D95A850275ED078');
        $this->addSql('ALTER TABLE profil_marketing DROP FOREIGN KEY FK_3CFA5748275ED078');
        $this->addSql('ALTER TABLE action_ressource DROP FOREIGN KEY FK_37995659FC6CD52A');
        $this->addSql('ALTER TABLE roadmap_step DROP FOREIGN KEY FK_FA9182DC135345B2');
        $this->addSql('ALTER TABLE roadmap_check DROP FOREIGN KEY FK_9C3D6617135345B2');
        $this->addSql('ALTER TABLE step_check DROP FOREIGN KEY FK_20AC5BEC14E7F069');
        $this->addSql('ALTER TABLE roadmap_step DROP FOREIGN KEY FK_FA9182DC73B21E9C');
        $this->addSql('ALTER TABLE step_action DROP FOREIGN KEY FK_6AD241E873B21E9C');
        $this->addSql('ALTER TABLE step_check DROP FOREIGN KEY FK_20AC5BEC73B21E9C');
        $this->addSql('ALTER TABLE action_check DROP FOREIGN KEY FK_DB4060AF40968788');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297A76ED395');
        $this->addSql('ALTER TABLE roadmap_check DROP FOREIGN KEY FK_9C3D6617A76ED395');
        $this->addSql('ALTER TABLE social_media DROP FOREIGN KEY FK_20BC159EA76ED395');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE action_ressource');
        $this->addSql('DROP TABLE action_check');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE profil_commercial');
        $this->addSql('DROP TABLE profil_marketing');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE roadmap');
        $this->addSql('DROP TABLE roadmap_step');
        $this->addSql('DROP TABLE roadmap_check');
        $this->addSql('DROP TABLE social_media');
        $this->addSql('DROP TABLE step');
        $this->addSql('DROP TABLE step_action');
        $this->addSql('DROP TABLE step_check');
        $this->addSql('DROP TABLE user');
    }
}
