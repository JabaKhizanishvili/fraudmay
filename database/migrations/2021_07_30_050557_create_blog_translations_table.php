<?php
/**
 *  database/migrations/2021_07_08_050557_create_blog_languages_table.php
 *
 * Date-Time: 08.07.21
 * Time: 09:17
 * @author suspended values
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('blog_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->longText('content')->nullable();

            $table->unique(['blog_id', 'locale']);
            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_languages');
    }
}
