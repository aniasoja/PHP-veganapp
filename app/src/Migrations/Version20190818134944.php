<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190818134944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE shops (id INT AUTO_INCREMENT NOT NULL, shop_id INT NOT NULL, shop_name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shops_products (shops_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_D1AC72EF1F5E0588 (shops_id), INDEX IDX_D1AC72EF6C8A81A9 (products_id), PRIMARY KEY(shops_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shops_products ADD CONSTRAINT FK_D1AC72EF1F5E0588 FOREIGN KEY (shops_id) REFERENCES shops (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shops_products ADD CONSTRAINT FK_D1AC72EF6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shops_products DROP FOREIGN KEY FK_D1AC72EF1F5E0588');
        $this->addSql('DROP TABLE shops');
        $this->addSql('DROP TABLE shops_products');
    }
}
