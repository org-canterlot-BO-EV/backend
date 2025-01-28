<?php

use App\Models\Program;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->integer('program_id', true);
            $table->string('program_nev', 50);
            $table->longText('program_leiras');
            $table->integer('program_ar');
            $table->date('program_datum');
            $table->date('foglalas_kezdete');
            $table->date('foglalas_vege');
            $table->integer('programtipus_id');

            $table->primary('program_id');
            $table->foreign('programtipus_id')->references('programtipus_id')->on('program_tipuses');
        });

        Program::create([
            'program_nev'=>'Bornapok',
            'program_leiras'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis metus sit amet libero finibus, fringilla tempor sapien tincidunt. Fusce sed rutrum diam. Nunc vulputate urna vel scelerisque lacinia. Integer viverra felis nisi, vel ultricies felis aliquam nec. Donec nibh quam, pretium lacinia nunc eu, facilisis auctor augue. Proin tempus facilisis iaculis. Pellentesque ullamcorper ut erat elementum posuere. Nulla ut justo eget nulla aliquam dignissim sed vel erat. Maecenas a tincidunt metus. Sed fringilla quam sit amet mi dictum, nec porttitor neque lacinia. Integer orci elit, iaculis a mauris ac, viverra vehicula dui. In suscipit bibendum purus. Duis finibus volutpat auctor.',
            'program_ar'=>'2000',
            'program_datum'=>'20250202',
            'foglalas_kezdete'=>'20250102',
            'foglalas_vege'=>'20250201',
            'programtipus_id'=>'2',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program');
    }
};
