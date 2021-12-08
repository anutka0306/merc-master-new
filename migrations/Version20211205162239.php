<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205162239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE naschiraboty_price_category (naschiraboty_id INT NOT NULL, price_category_id INT NOT NULL, INDEX IDX_292F712252A1D855 (naschiraboty_id), INDEX IDX_292F7122159FD1F4 (price_category_id), PRIMARY KEY(naschiraboty_id, price_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE naschiraboty_price_category ADD CONSTRAINT FK_292F712252A1D855 FOREIGN KEY (naschiraboty_id) REFERENCES naschiraboty (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE naschiraboty_price_category ADD CONSTRAINT FK_292F7122159FD1F4 FOREIGN KEY (price_category_id) REFERENCES price__categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE naschiraboty_price_category');
        $this->addSql('ALTER TABLE attach_main_gallery CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE attach_nashiraboty DROP FOREIGN KEY FK_D810F4F97553B578');
        $this->addSql('ALTER TABLE attach_nashiraboty DROP FOREIGN KEY FK_D810F4F97553B578');
        $this->addSql('ALTER TABLE attach_nashiraboty ADD CONSTRAINT attach_nashiraboty_ibfk_1 FOREIGN KEY (nashiraboty_id) REFERENCES naschiraboty (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_d810f4f97553b578 ON attach_nashiraboty');
        $this->addSql('CREATE INDEX nashiraboty_id ON attach_nashiraboty (nashiraboty_id)');
        $this->addSql('ALTER TABLE attach_nashiraboty ADD CONSTRAINT FK_D810F4F97553B578 FOREIGN KEY (nashiraboty_id) REFERENCES naschiraboty (id)');
        $this->addSql('ALTER TABLE attachment DROP FOREIGN KEY FK_795FD9BB62D84DE6');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BB62D84DE6 FOREIGN KEY (our_works_id) REFERENCES our_works (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE before_after DROP FOREIGN KEY FK_4459C2111BC38CF0');
        $this->addSql('DROP INDEX IDX_4459C2111BC38CF0 ON before_after');
        $this->addSql('DROP INDEX name ON config');
        $this->addSql('ALTER TABLE config CHANGE name name VARCHAR(191) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE value value TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9727ACA70');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A944F5D008');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A97975B7E7');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9ED5CA9E6');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9159FD1F4');
        $this->addSql('DROP INDEX IDX_FEC530A944F5D008 ON content');
        $this->addSql('DROP INDEX IDX_FEC530A97975B7E7 ON content');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9727ACA70');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9ED5CA9E6');
        $this->addSql('ALTER TABLE content DROP FOREIGN KEY FK_FEC530A9159FD1F4');
        $this->addSql('ALTER TABLE content CHANGE text text TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE sort sort INT DEFAULT 0 NOT NULL, CHANGE published published TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE name name VARCHAR(250) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE h1 h1 VARCHAR(191) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE meta_description meta_description VARCHAR(1024) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE rating_value rating_value DOUBLE PRECISION UNSIGNED DEFAULT \'4.8\' NOT NULL, CHANGE page_type page_type VARCHAR(15) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT content_ibfk_1 FOREIGN KEY (service_id) REFERENCES price__services (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_fec530a9ed5ca9e6 ON content');
        $this->addSql('CREATE INDEX service_id ON content (service_id)');
        $this->addSql('DROP INDEX idx_fec530a9159fd1f4 ON content');
        $this->addSql('CREATE INDEX price_category_id ON content (price_category_id)');
        $this->addSql('DROP INDEX idx_fec530a9727aca70 ON content');
        $this->addSql('CREATE INDEX parent_id ON content (parent_id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9727ACA70 FOREIGN KEY (parent_id) REFERENCES content (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES price__services (id)');
        $this->addSql('ALTER TABLE content ADD CONSTRAINT FK_FEC530A9159FD1F4 FOREIGN KEY (price_category_id) REFERENCES price__categories (id)');
        $this->addSql('ALTER TABLE menu_left DROP FOREIGN KEY FK_B2281726ADA40271');
        $this->addSql('ALTER TABLE menu_left ADD CONSTRAINT FK_B2281726ADA40271 FOREIGN KEY (link_id) REFERENCES content (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_top DROP FOREIGN KEY FK_8678D1F8ADA40271');
        $this->addSql('ALTER TABLE menu_top ADD CONSTRAINT FK_8678D1F8ADA40271 FOREIGN KEY (link_id) REFERENCES content (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE naschiraboty DROP FOREIGN KEY FK_1CCA358B7975B7E7');
        $this->addSql('ALTER TABLE naschiraboty DROP FOREIGN KEY FK_1CCA358BED5CA9E6');
        $this->addSql('DROP INDEX IDX_1CCA358B7975B7E7 ON naschiraboty');
        $this->addSql('ALTER TABLE naschiraboty CHANGE meta_title meta_title VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE meta_description meta_description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE text text TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE sum sum INT DEFAULT NULL, CHANGE short_text short_text LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE client_name client_name VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE gallery gallery VARCHAR(1000) CHARACTER SET utf8 DEFAULT \'\'\'\'\'\' COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE naschiraboty ADD CONSTRAINT FK_1CCA358BED5CA9E6 FOREIGN KEY (service_id) REFERENCES price__services (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news CHANGE name name VARCHAR(250) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE meta_title meta_title VARCHAR(250) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE meta_description meta_description VARCHAR(250) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE sort sort INT DEFAULT 0 NOT NULL, CHANGE count_views count_views INT DEFAULT 0 NOT NULL, CHANGE count_like count_like INT DEFAULT 0 NOT NULL, CHANGE count_dislike count_dislike INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE our_works DROP FOREIGN KEY FK_378B4B511BC38CF0');
        $this->addSql('DROP INDEX IDX_378B4B511BC38CF0 ON our_works');
        $this->addSql('ALTER TABLE price__brand CHANGE phone2 phone2 VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('CREATE UNIQUE INDEX name ON price__brand (name)');
        $this->addSql('ALTER TABLE price__categories DROP FOREIGN KEY FK_5E61FA06727ACA70');
        $this->addSql('DROP INDEX IDX_5E61FA06727ACA70 ON price__categories');
        $this->addSql('ALTER TABLE price__model DROP FOREIGN KEY FK_10343615ED4B199F');
        $this->addSql('ALTER TABLE price__model DROP FOREIGN KEY FK_1034361544F5D008');
        $this->addSql('DROP INDEX IDX_10343615ED4B199F ON price__model');
        $this->addSql('ALTER TABLE price__model CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE class class INT DEFAULT 1 NOT NULL, CHANGE brand_id brand_id INT NOT NULL, CHANGE name name VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE code code VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE name_rus name_rus VARCHAR(200) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE increase increase DOUBLE PRECISION DEFAULT \'0.00\' NOT NULL');
        $this->addSql('ALTER TABLE price__model ADD CONSTRAINT price__model_ibfk_1 FOREIGN KEY (brand_id) REFERENCES price__brand (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price__services DROP FOREIGN KEY FK_DE4397F5159FD1F4');
        $this->addSql('ALTER TABLE price__services DROP FOREIGN KEY FK_DE4397F5159FD1F4');
        $this->addSql('ALTER TABLE price__services CHANGE price_category_id price_category_id INT DEFAULT NULL, CHANGE published published TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE is_popular is_popular TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE price__services ADD CONSTRAINT price__services_ibfk_1 FOREIGN KEY (price_category_id) REFERENCES price__categories (id) ON UPDATE CASCADE ON DELETE SET NULL');
        $this->addSql('DROP INDEX idx_de4397f5159fd1f4 ON price__services');
        $this->addSql('CREATE INDEX price_category_id ON price__services (price_category_id)');
        $this->addSql('ALTER TABLE price__services ADD CONSTRAINT FK_DE4397F5159FD1F4 FOREIGN KEY (price_category_id) REFERENCES price__categories (id)');
        $this->addSql('ALTER TABLE salon_price_model DROP FOREIGN KEY FK_994B77421BC38CF0');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C1BC38CF0');
    }
}
