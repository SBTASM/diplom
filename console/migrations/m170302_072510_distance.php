<?php

use yii\db\Migration;

class m170302_072510_distance extends Migration
{

    protected $init_data = [
        ['distance' => '50м бат', 'day' => false],
        ['distance' => '50м бат', 'day' => true],
        
        ['distance' => '50м н/с', 'day' => false],
        ['distance' => '50м н/с', 'day' => true],
        
        ['distance' => '50м брасc', 'day' => true],
        ['distance' => '50м брасc', 'day' => false],
        
        ['distance' => '50м в/с', 'day' => true],
        ['distance' => '50м в/с', 'day' => false],
        
        ['distance' => '100 к/п', 'day' => true],
        ['distance' => '100 к/п', 'day' => false],
        
        ['distance' => '100 бат', 'day' => true],
        ['distance' => '100 бат', 'day' => false],
        
        ['distance' => '100 н/с', 'day' => true],
        ['distance' => '100 н/с', 'day' => false],
        
        ['distance' => '100 брасc', 'day' => true],
        ['distance' => '100 брасc', 'day' => false],
        
        ['distance' => '200 к/п', 'day' => true],
        ['distance' => '200 к/п', 'day' => false],
        
        ['distance' => '200 бат', 'day' => true],
        ['distance' => '200 бат', 'day' => false],
        
        ['distance' => '200 н/с', 'day' => true],
        ['distance' => '200 н/с', 'day' => false],
        
        ['distance' => '200 брасc', 'day' => true],
        ['distance' => '200 брасc', 'day' => false],
    ];

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%distance}}', [
            'id' => $this->primaryKey(),
            'distance' => $this->string(32)->notNull(),
            'day' => $this->boolean()->defaultValue(false),
        ], $tableOptions);

        $this->initData();
    }

    public function down()
    {
        echo "m170302_072510_distance cannot be reverted.\n";

        return $this->dropTable('{{%distance}}');
    }
    protected function initData(){
        foreach ($this->init_data as $data){
            $this->insert("{{%distance}}", $data);
        }
    }
}
