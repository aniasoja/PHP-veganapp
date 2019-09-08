<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190828211715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(45) NOT NULL, bigger_category_name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, dish_name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, dishes_id INT DEFAULT NULL, categories_id INT DEFAULT NULL, name VARCHAR(45) NOT NULL, is_vegan TINYINT(1) NOT NULL, is_palm_oil TINYINT(1) NOT NULL, photo LONGBLOB DEFAULT NULL, is_reviewed TINYINT(1) NOT NULL, INDEX IDX_B3BA5A5AA05DD37A (dishes_id), INDEX IDX_B3BA5A5AA21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shops (id INT AUTO_INCREMENT NOT NULL, shop_name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shops_products (shops_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_D1AC72EF1F5E0588 (shops_id), INDEX IDX_D1AC72EF6C8A81A9 (products_id), PRIMARY KEY(shops_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AA05DD37A FOREIGN KEY (dishes_id) REFERENCES dishes (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE shops_products ADD CONSTRAINT FK_D1AC72EF1F5E0588 FOREIGN KEY (shops_id) REFERENCES shops (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shops_products ADD CONSTRAINT FK_D1AC72EF6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE sprawdzam');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AA21214B7');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AA05DD37A');
        $this->addSql('ALTER TABLE shops_products DROP FOREIGN KEY FK_D1AC72EF6C8A81A9');
        $this->addSql('ALTER TABLE shops_products DROP FOREIGN KEY FK_D1AC72EF1F5E0588');
        $this->addSql('CREATE TABLE sprawdzam (id INT AUTO_INCREMENT NOT NULL, nazwa VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE dishes');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE shops');
        $this->addSql('DROP TABLE shops_products');
    }
}
