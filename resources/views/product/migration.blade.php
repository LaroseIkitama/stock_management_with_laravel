$table->string('description');
$table->integer('stock')->default(0);
$table->foreignId('categories_id')->constrained();
$table->foreignId('user_id')->constrained();
