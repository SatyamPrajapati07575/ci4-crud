<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSubject extends Migration
{
    public function up()
    {
        //
       $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'

            ],
            'description' => [
                'type' => 'TEXT'
            ]
       ]);
       $this->forge->addPrimaryKey('id');
       $this->forge->createTable('subjects');
    }

    public function down()
    {
        //
        $this->forge->dropTable('subjects');
    }
}
