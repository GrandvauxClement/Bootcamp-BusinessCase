<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211124133613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jour_semaine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation_resto_jour_dispo (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, dispo_ouverture_id INT NOT NULL, nom_jour_id INT NOT NULL, INDEX IDX_226ECE38B1E7706E (restaurant_id), INDEX IDX_226ECE381E2D6DF3 (dispo_ouverture_id), INDEX IDX_226ECE38D7836118 (nom_jour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE relation_resto_jour_dispo ADD CONSTRAINT FK_226ECE38B1E7706E FOREIGN KEY (restaurant_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE relation_resto_jour_dispo ADD CONSTRAINT FK_226ECE381E2D6DF3 FOREIGN KEY (dispo_ouverture_id) REFERENCES dispo_ouverture (id)');
        $this->addSql('ALTER TABLE relation_resto_jour_dispo ADD CONSTRAINT FK_226ECE38D7836118 FOREIGN KEY (nom_jour_id) REFERENCES jour_semaine (id)');
        $this->addSql('DROP TABLE dispo_ouverture_etablissement');
        $this->addSql('ALTER TABLE dispo_ouverture DROP nom_jour');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE relation_resto_jour_dispo DROP FOREIGN KEY FK_226ECE38D7836118');
        $this->addSql('CREATE TABLE dispo_ouverture_etablissement (dispo_ouverture_id INT NOT NULL, etablissement_id INT NOT NULL, INDEX IDX_C88BE1C31E2D6DF3 (dispo_ouverture_id), INDEX IDX_C88BE1C3FF631228 (etablissement_id), PRIMARY KEY(dispo_ouverture_id, etablissement_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE dispo_ouverture_etablissement ADD CONSTRAINT FK_C88BE1C31E2D6DF3 FOREIGN KEY (dispo_ouverture_id) REFERENCES dispo_ouverture (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dispo_ouverture_etablissement ADD CONSTRAINT FK_C88BE1C3FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE jour_semaine');
        $this->addSql('DROP TABLE relation_resto_jour_dispo');
        $this->addSql('ALTER TABLE dispo_ouverture ADD nom_jour VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
