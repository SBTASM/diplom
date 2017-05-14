<?php

use yii\db\Migration;

class m170302_090423_distances extends Migration
{
    protected $init_data = [

    ];

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%distances}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'distance_id' => $this->integer()->notNull(),
            'pre_time' => $this->string()->notNull(),
            'day' => $this->boolean()->notNull()->defaultValue(false)
        ], $tableOptions);

        $this->createIndex('idx-distances-owner_id', 'distances', 'owner_id');
        $this->createIndex('idx-distances-distance_id', 'distances', 'distance_id');

        $this->addForeignKey(
            'fk-distances-owner_id',
            'distances',
            'owner_id',
            'request',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-distances-distance_id',
            'distances',
            'distance_id',
            'distance',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m170302_090423_distances cannot be reverted.\n";

        return $this->dropTable('{{%distances}}');
    }

}
