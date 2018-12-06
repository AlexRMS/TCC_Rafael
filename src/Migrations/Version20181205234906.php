<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181205234906 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE funcionario (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mesa (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido (id INT AUTO_INCREMENT NOT NULL, mesa_id INT NOT NULL, INDEX IDX_C4EC16CE8BDC7AE9 (mesa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedido_produto (id INT AUTO_INCREMENT NOT NULL, pedido_id INT NOT NULL, produto_id INT NOT NULL, valor DOUBLE PRECISION NOT NULL, INDEX IDX_3ED5C1B94854653A (pedido_id), INDEX IDX_3ED5C1B9105CFD56 (produto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produto (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, valor DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CE8BDC7AE9 FOREIGN KEY (mesa_id) REFERENCES mesa (id)');
        $this->addSql('ALTER TABLE pedido_produto ADD CONSTRAINT FK_3ED5C1B94854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id)');
        $this->addSql('ALTER TABLE pedido_produto ADD CONSTRAINT FK_3ED5C1B9105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pedido DROP FOREIGN KEY FK_C4EC16CE8BDC7AE9');
        $this->addSql('ALTER TABLE pedido_produto DROP FOREIGN KEY FK_3ED5C1B94854653A');
        $this->addSql('ALTER TABLE pedido_produto DROP FOREIGN KEY FK_3ED5C1B9105CFD56');
        $this->addSql('DROP TABLE funcionario');
        $this->addSql('DROP TABLE mesa');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE pedido_produto');
        $this->addSql('DROP TABLE produto');
    }
}
