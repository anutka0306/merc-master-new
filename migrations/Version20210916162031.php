<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916162031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE naschiraboty ADD service_id INT DEFAULT NULL');

        $this->addSql('ALTER TABLE naschiraboty ADD CONSTRAINT FK_1CCA358BED5CA9E6 FOREIGN KEY (service_id) REFERENCES price__services (id)');

        $this->addSql('CREATE INDEX IDX_1CCA358BED5CA9E6 ON naschiraboty (service_id)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE naschiraboty DROP FOREIGN KEY FK_1CCA358B7975B7E7');
        $this->addSql('ALTER TABLE naschiraboty DROP FOREIGN KEY FK_1CCA358BED5CA9E6');
        $this->addSql('DROP INDEX IDX_1CCA358B7975B7E7 ON naschiraboty');
        $this->addSql('DROP INDEX IDX_1CCA358BED5CA9E6 ON naschiraboty');
        $this->addSql('ALTER TABLE naschiraboty DROP service_id');

    }
}
