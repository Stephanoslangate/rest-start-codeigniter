<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Utilisateur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'prenom' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        //  'type' => 'TEXT', &| 'null' => true, &| 'unsigned' => true, &| 'auto_increment' => true,
        //  'type' => 'VARCHAR', &|  'null' => true, &| 'unsigned' => true, &| 'auto_increment' => true,
        //

        $this->forge->addKey('id', true);
        $this->forge->createTable('utilisateur');
    }

    public function down()
    {
        $this->forge->dropTable('utilisateur');
    }
}
