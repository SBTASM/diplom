<?php

use yii\db\Migration;

class m170302_072330_age_group extends Migration
{
	
	protected $age_groups = [
		['group' => '25-29'],
		['group' => '30-34'],
		['group' => '35-39'],
		['group' => '40-44'],
		['group' => '45-49'],
	];
	
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%age_group}}', [
			'id' => $this->primaryKey(),
			'group' => $this->string(32)->notNull()->unique(),
        ], $tableOptions);
		
		$this->initData();
    }

    public function down()
    {
        echo "m170302_072330_age_group cannot be reverted.\n";

        return $this->dropTable('{{%age_group}}');
    }
	
	protected function initData(){
		foreach($this->age_groups as $group){
			$this->insert("{{%age_group}}", $group);
		}
	}
}
