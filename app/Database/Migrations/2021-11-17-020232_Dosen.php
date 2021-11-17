<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField ( [
            'nip'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,        
            ],
            'jenis_kelamin' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,           
            ],
            'golongan'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,     
            ],
            'gaji'          => [
                'type'           => 'INT',
                'constraint'     => 11,        
            ],
        ]);

        $this->forge->addKey('nip', TRUE);
        $this->forge->createTable('dosen', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('dosen');
    }
}
